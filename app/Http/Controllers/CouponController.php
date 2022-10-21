<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use Storage;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function list()
    {
        $coupons = Coupon::get();
        return view('admin.coupon', ['coupons' => $coupons]);
    }

    public function save(Request $req)
    {
    	// nếu tồn tại coupon_id tức là sửa coupon
    	if(isset($req->couponID)) { //check tồn tại couponID từ phía client
    		$coupon = Coupon::where('id', $req->couponID)->first();
    		if(isset($coupon)) {
                //update các giá trị mới
                $start = new Carbon($req->start);
                $expired = new Carbon($req->expired);

    			$coupon->code = $req->couponCode;
    			$coupon->quantity = $req->quantity;
    			$coupon->percent = $req->percent;
    			$coupon->start = $start->toDateString();
    			$coupon->expired = $expired->toDateString();
	    		$coupon->coupon_description = $req->couponDes;
	    		// lưu dữ liệu mới
	    		$coupon->save();
                return redirect()->route('coupon');
    		} else {
                return redirect()->route('coupon');
    		}
    	} else {
            //nếu không tồn tại coupon_id tức là tạo mới coupon
            $start = new Carbon($req->start);
            $expired = new Carbon($req->expired);

    		$coupon['code'] = $req->couponCode;
    		$coupon['quantity'] = $req->quantity;
    		$coupon['percent'] = $req->percent;
    		$coupon['start'] = $start->toDateString();
    		$coupon['expired'] = $expired->toDateString();
    		$coupon['coupon_description'] = $req->couponDes;
    		$result = coupon::create($coupon);
            return redirect()->route('coupon');
    	}
    }

    public function delete(Request $req)
    {
        $coupon = Coupon::where('id', $req->couponID)->first();
        if(isset($coupon)) {
            // xóa mã giảm giá
            if($coupon->delete() > 0) {
                return response()->json([
                    'status' => true,
                    'message' => "Xóa mã giảm giá thành công !"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Xóa mã giảm giá thất bại !"
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Không tìm thấy mã giảm giá cần xóa !"
            ]);
        }
    }
}
