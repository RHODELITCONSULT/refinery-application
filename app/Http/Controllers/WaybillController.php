<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Consignor;
use App\Models\Customer;
use App\Models\Meter;
use App\Models\Product;
use App\Models\Waybill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class WaybillController extends Controller
{
    public function index()
    {
        try {
            $waybills = Waybill::query()->orderBy('created_at', 'desc')->get();
            return view('waybill.waybills', compact('waybills'));
        } catch (\Exception $e) {
            Log::error("WAYBILL_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function create()
    {
        $products   = Product::query()->get();
        $categories = Category::query()->get();
        $consignors = Consignor::query()->get();
        $meters     = Meter::query()->get();
        $customers  = Customer::query()->get();
        return view('waybill.create-waybill', [
            'products'      => $products, 
            "categories"    => $categories, 
            "consignors"    => $consignors, 
            'meters'        => $meters,
            'customers'     => $customers
        ]);
    }

    public function edit($id)
    {

        $waybill = Waybill::query()->where('id', $id)->first();
        $products   = Product::query()->get();
        $categories = Category::query()->get();
        $consignors = Consignor::query()->get();
        $meters     = Meter::query()->get();
        $customers  = Customer::query()->get();
        return view('waybill.edit-waybill', [
            'waybill'       => $waybill,
            'products'      => $products, 
            "categories"    => $categories, 
            "consignors"    => $consignors, 
            'meters'        => $meters,
            'customers'     => $customers
        ]);
    }

    public function store(Request $request)
    {
        try {

            $rules = [
                "product"       => "required|string",
                "category"      => "required|string",
                "meter"         => "required|string",
                "consignor"     => "required|string",
                "customer"      => "required|string",
                "order_type"    => "required|string",
                "destination"   => "required|string",
                "volume"        => "required|string",
                "opening"       => "required|string",
                "closing"       => "required|string",
                "driver"        => "required|string",
                "head_number"   => "required|string",
                "trailer_number" => "required|string",
                "description"   => "required|string",

            ];

            $validation = Validator::make(request()->all(), $rules);
            if ($validation->fails()) {
                return back()->with('error', $validation->errors()->first())->withInput(request()->all());
            }

            //* Generate Waybill special code
            $lastWaybill = Waybill::query()->latest('barcode')->first();

            if ($lastWaybill) {
                $lastNumber = intval($lastWaybill->barcode);
                $nextNumber = $lastNumber + 1;
            } else {
                $nextNumber = 1;
            }

            if ($nextNumber < 1000) {
                $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            } else {
                $formattedNumber = (string) $nextNumber;
            }
            $waybill = Waybill::query()->create([
                "product"               => $request->product,
                "category"              => $request->category,
                "meter"                 => $request->meter,
                "description"           => $request->description,
                "consignor"             => $request->consignor,
                "customer"              => $request->customer,
                "order_type"            => $request->order_type,
                "destination"           => $request->destination,
                "volume"                => $request->volume,
                "opening"               => $request->opening,
                "closing"               => $request->closing,
                "driver"                => $request->driver,
                "truck_head_number"     => $request->head_number,
                "truck_trailer_number"  => $request->trailer_number,
                "barcode"               => $formattedNumber,
                "added_by"              => "Jane Doe",
            ]);
            if ($waybill) {
                return back()->with('success', "Waybill Created Successfully");
            } else {
                return back()->with('error', "Sorry, A problem occurred during the creation of the waybill")->withInput(request()->all());
            }
        } catch (\Exception $e) {
            Log::error("WAYBILL_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry Internal Server Error")->withInput(request()->all());
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $rules = [
                "product"       => "required|string",
                "category"      => "required|string",
                "meter"         => "required|string",
                "consignor"     => "required|string",
                "customer"      => "required|string",
                "order_type"    => "required|string",
                "destination"   => "required|string",
                "volume"        => "required|string",
                "opening"       => "required|string",
                "closing"       => "required|string",
                "driver"        => "required|string",
                "head_number"   => "required|string",
                "trailer_number"=> "required|string",
                "description"   => "required|string",
                "trailer_number"=> "required|string",

            ];

            $validation = Validator::make(request()->all(), $rules);
            if ($validation->fails()) {
                return back()->with('error', $validation->errors()->first());
            }
            $waybill = Waybill::query()->where('id', $id)->update([
                "product"               => $request->product,
                "category"              => $request->category,
                "description"           => $request->description,
                "meter"                 => $request->meter,
                "consignor"             => $request->consignor,
                "customer"              => $request->customer,
                "order_type"            => $request->order_type,
                "destination"           => $request->destination,
                "volume"                => $request->volume,
                "opening"               => $request->opening,
                "closing"               => $request->closing,
                "driver"                => $request->driver,
                "truck_head_number"     => $request->head_number,
                "truck_trailer_number"  => $request->trailer_number,
            ]);
            if ($waybill) {
                return redirect()->route('waybills')->with('success', "Waybill Updated Successfully");
            } else {
                return back()->with('error', "Sorry, A problem occurred during the creation of the waybill");
            }
        } catch (\Exception $e) {
            Log::error("WAYBILL_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function show($id){

        $waybill = Waybill::query()->where('id',$id)->first();
        $consignor = Consignor::query()->where('consignor',$waybill->consignor)->first();
        return view('waybill.view-waybill',[
            'waybill' => $waybill,
            'consignor' => $consignor
        ]);
    }

    public function destroy($id)
    {
        try {
            $waybill_delete = Waybill::query()->where('id', $id)->delete();
            if ($waybill_delete) {
                return back()->with('success', "Waybill Deleted Successfully");
            } else {
                return back()->with('error', "Sorry, A problem occurred during the creation of the waybill");
            }
        } catch (\Exception $e) {
            Log::error("WAYBILL_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }
}
