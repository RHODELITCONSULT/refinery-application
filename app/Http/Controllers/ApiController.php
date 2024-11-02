<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waybill;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getWaybillsPerMonth(Request $request)
    {
        $year = $request->input('year', date('Y'));

        $waybillsPerMonth = Waybill::selectRaw('customer, MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $year)
            ->groupBy('customer', 'month')
            ->orderBy('customer')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $item->month = Carbon::create()->month($item->month)->format('M');
                return $item;
            });

        return response()->json($waybillsPerMonth);
    }

    public function getWaybillsPerProduct()
    {
        $waybills = Waybill::select('product', DB::raw('count(*) as count'))
            ->groupBy('product')
            ->get();

        return response()->json($waybills);
    }
}
