<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use Storage;
use App\Models\Brand;

class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::get();
        return view('admin.brand', ['brands' => $brands]);
    }

    public function save(Request $req)
    {
    	// nếu tồn tại brand_id tức là sửa brand
    	if(isset($req->brandID)) { //check tồn tại brandID từ phía client
    		$brand = Brand::where('id', $req->brandID)->first();
    		if(isset($brand)) {
    			//update các giá trị mới
    			$brand->brand_name = $req->brandName;
	    		$brand->brand_description = $req->brandDes;
	    		// lưu dữ liệu mới
	    		$brand->save();
                return redirect()->route('brand');
    		} else {
                return redirect()->route('brand');
    		}
    	} else {
    		//nếu không tồn tại brand_id tức là tạo mới brand
    		$brand['brand_name'] = $req->brandName;
    		$brand['brand_description'] = $req->brandDes;
    		$result = brand::create($brand);
            return redirect()->route('brand');
    	}
    }

    public function delete(Request $req)
    {
        $brand = Brand::where('id', $req->brandID)->first();
        if(isset($brand)) {
            // xóa nhãn hiệu
            if($brand->delete() > 0) {
                return response()->json([
                    'status' => true,
                    'message' => "Xóa nhãn hiệu thành công !"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Xóa nhãn hiệu thất bại !"
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Không tìm thấy nhãn hiệu cần xóa !"
            ]);
        }
    }
}
