<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use Illuminate\Routing\Redirector;
use Auth;

class OrderController extends Controller
{
    public function list()
    {
        $list = Order::all();
        foreach($list as $item) {
            $item->state = $this->getState($item->state);
        }
        return view('admin.order', ['list' => $list]);
    }

    public function getState($state)
    {
        if ($state == 0) {
            return "Chờ thanh toán";
        } else if ($state == 1) {
            return "Đã thanh toán";
        } else if ($state == 2) {
            return "Đã hủy";
        }
    }

    public function changeState(Request $req)
    {
        $order = Order::where('id', $req->orderID)->first();
        if (isset($order->id)) {
            $order->state = $req->state;
            if($order->save()) {
                return response()->json([
                    'status' => true,
                    'message' => "Cập nhật trạng thái đơn hàng thành công"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Cập nhật trạng thái đơn hàng thất bại"
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Cập nhật trạng thái đơn hàng thất bại"
            ]);
        }
    }
}
