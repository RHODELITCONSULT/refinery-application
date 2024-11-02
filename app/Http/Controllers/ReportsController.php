<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Waybill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportsController extends Controller
{

    public function index()
    {
        try {
            $duration = request("duration", "quarterly");
            $reports = collect();

            if ($duration === "quarterly") {
                $reports = DB::table('waybills')
                    ->select(
                        DB::raw('YEAR(created_at) as year'),
                        DB::raw('CONCAT("Q", QUARTER(created_at)) as period'), // Use 'period' for consistency
                        'product',
                        DB::raw('COUNT(DISTINCT customer) as number_of_customers'),
                        DB::raw('SUM(volume) as total_volume')
                    )
                    ->groupBy('year', 'period', 'product')
                    ->orderBy('year', 'desc')
                    ->orderBy('period', 'desc')
                    ->get();

            } elseif ($duration === "midyear") {
                $reports = DB::table('waybills')
                ->select(
                    DB::raw('YEAR(created_at) as year'),
                    DB::raw('CASE
                                WHEN MONTH(created_at) BETWEEN 1 AND 6 THEN "H1"
                                ELSE "H2"
                            END as period'),
                    'product',
                    DB::raw('COUNT(DISTINCT customer) as number_of_customers'),
                    DB::raw('SUM(volume) as total_volume')
                )
                ->whereIn(DB::raw('MONTH(created_at)'), range(1, 12))
                ->groupBy('year', 'period', 'product')
                ->orderBy('year', 'desc')
                ->orderBy('period', 'desc')
                ->get();


            } elseif ($duration === "yearly") {
                $reports = DB::table('waybills')
                    ->select(
                        DB::raw('YEAR(created_at) as year'),
                        DB::raw('"Yearly" as period'),
                        'product',
                        DB::raw('COUNT(DISTINCT customer) as number_of_customers'),
                        DB::raw('SUM(volume) as total_volume')
                    )
                    ->groupBy('year', 'period', 'product')
                    ->orderBy('year', 'desc')
                    ->get();
            }
            // dd($reports);
            return view('Reporting-and-Analytics.reports-page', ["report_data" => $reports]);

        } catch (\Exception $e) {
            Log::error("REPORT_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry, an internal server error occurred.");
        }
    }

    public function customerReportIndex() {
        try {
            $duration = request("duration", "quarterly");
            $reports = collect();

            if ($duration === "quarterly") {
                $reports = DB::table('waybills')
                    ->select(
                        DB::raw('YEAR(created_at) as year'),
                        DB::raw('CONCAT("Q", QUARTER(created_at)) as period'),
                        'customer',
                        DB::raw('COUNT(*) as number_of_waybills'),
                        DB::raw('SUM(volume) as total_volume')
                    )
                    ->groupBy('year', 'period', 'customer')
                    ->orderBy('year', 'desc')
                    ->orderBy('period', 'desc')
                    ->get();

            } elseif ($duration === "midyear") {
                $reports = DB::table('waybills')
                    ->select(
                        DB::raw('YEAR(created_at) as year'),
                        DB::raw('CASE
                                    WHEN MONTH(created_at) BETWEEN 1 AND 6 THEN "H1"
                                    ELSE "H2"
                                END as period'),
                        'customer',
                        DB::raw('COUNT(*) as number_of_waybills'),
                        DB::raw('SUM(volume) as total_volume')
                    )
                    ->whereIn(DB::raw('MONTH(created_at)'), range(1, 12))
                    ->groupBy('year', 'period', 'customer')
                    ->orderBy('year', 'desc')
                    ->orderBy('period', 'desc')
                    ->get();

            } elseif ($duration === "yearly") {
                $reports = DB::table('waybills')
                    ->select(
                        DB::raw('YEAR(created_at) as year'),
                        '"Yearly" as period',
                        'customer',
                        DB::raw('COUNT(*) as number_of_waybills'),
                        DB::raw('SUM(volume) as total_volume')
                    )
                    ->groupBy('year', 'period', 'customer')
                    ->orderBy('year', 'desc')
                    ->get();
            }

            // Pass the reports to the view
            return view('Reporting-and-Analytics.customer-report', ['report_data' => $reports]);

        } catch (\Exception $e) {
            Log::error("CUSTOMER_REPORT_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry, an internal server error occurred.");
        }
    }

    public function customReportFilter(){
        try{

            $customers = Customer::query()->orderBy('name','asc')->get();
            $products = Product::query()->orderBy('name','asc')->get();

            $waybills = Waybill::query()->orderBy("created_at",'desc')->get();
            return view('Reporting-and-Analytics.custom-filter-report',[
                "customers" => $customers,
                "products"  => $products,
                "waybills"  => $waybills
            ]);

        }catch(\Exception $e){
            Log::error("CUSTOM_REPORT_FILTER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, an internal server error occurred.");
        }
    }

    /**
     * Filters the waybills based on the given input parameters.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function filterWaybills(Request $request){
        try{
            $customer   = request("customer", null);
            $product    = request("product", null);
            $endDate    = request("endDate",null);
            $startDate  = request("startDate",null);

            $waybills = Waybill::query();
            if($startDate && !$endDate){
                return back()->with('error', "Please select end date");
            }elseif(!$startDate && $endDate){
                return back()->with('error', "Please select start date");
            }elseif($startDate && $endDate){
                $startDate = Carbon::parse($startDate);
                $endDate   = Carbon::parse($endDate);
                $waybills = $waybills->whereBetween('created_at',[$startDate,$endDate]);
            }
            if($customer){
                $waybills = $waybills->where('customer',$customer);
            }
            if($product){
                $waybills = $waybills->where('product',$product);
            }

            $waybills = $waybills->orderBy("created_at","desc")->get();

            $customers = Customer::query()->orderBy('name','asc')->get();
            $products = Product::query()->orderBy('name','asc')->get();

            return view('Reporting-and-Analytics.custom-filter-report',[
                "customers" => $customers,
                "products"  => $products,
                "waybills"  => $waybills
            ]);
        }catch(\Exception $e){
            Log::error("CUSTOM_REPORT_FILTER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, an internal server error occurred.");
        }
    }


}
