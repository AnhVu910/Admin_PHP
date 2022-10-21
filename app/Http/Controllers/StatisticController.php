<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductSold;
use App\Models\Product;
use Carbon\Carbon;
use DB;

class StatisticController extends Controller
{
    public function list()
    {
        $now = Carbon::now();
        $firstMonth = Carbon::now();
        $firstMonth->setDay("1");
        $table = ProductSold::select(
            'product_id',
            DB::raw('sum(product_solds.product_quantity) as quantity')
        )
        ->whereBetween('updated_at', [$firstMonth, $now])
        ->groupBy('product_solds.product_id')
        ->get();
        $this->getProductName($table);
        return view('admin.chart', ['table' => $table, 'month' => $now->month]);
    }

    public function getProductName($table)
    {
        foreach ($table as $item) {
            $item->name = Product::where('id', $item->product_id)->value('name');
        }
        return $table;
    }

    public function getRevenue()
    {
        $now = Carbon::now();
        $firstMonth = Carbon::now();
        $firstMonth->setDay("1");
        $total = Order::whereBetween('updated_at', [$firstMonth, $now])
        ->sum('total');
        $discount = Order::whereBetween('updated_at', [$firstMonth, $now])
        ->sum('discount');
        return response()->json([
            'total' => $total,
            'discount' => $discount
        ]);
    }

    public function getRevenueByDate(Request $req)
    {
        $start = new Carbon($req->startDate);
        $end = new Carbon($req->endDate);
        $total = Order::whereBetween('updated_at', [$start, $end])
        ->sum('total');
        $discount = Order::whereBetween('updated_at', [$start, $end])
        ->sum('discount');
        return response()->json([
            'total' => $total,
            'discount' => $discount
        ]);
    }
}
