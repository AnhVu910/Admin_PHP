<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use Storage;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::get();
        return view('admin.category', ['categories' => $categories]);
    }

    public function save(Request $req)
    {
    	// nếu tồn tại category_id tức là sửa category
    	if(isset($req->categoryID)) { //check tồn tại categoryID từ phía client
    		$category = Category::where('id', $req->categoryID)->first();
    		if(isset($category)) {
    			//update các giá trị mới
    			$category->name = $req->categoryName;
	    		$category->description = $req->categoryDes;
	    		// trong trường hợp edit mà muốn sửa lại file hình ảnh thì mới thực hiện thay đổi ảnh
	    		if(isset($req->categoryFile)) {
                    $this->deleteImg($category->image_url);
                    $category->image_url = $this->saveImg($req);
	    		}
	    		// lưu dữ liệu mới
	    		$category->save();
                // return $this->list();
                return redirect()->route('category');
    		} else {
                // return $this->list();
                return redirect()->route('category');
    		}
    	} else {
    		//nếu không tồn tại category_id tức là tạo mới category
    		$category['name'] = $req->categoryName;
    		$category['description'] = $req->categoryDes;
    		$category['image_url'] = $this->saveImg($req);
    		$result = Category::create($category);
            // return $this->list();
            return redirect()->route('category');
    	}
    }

    // hàm upload ảnh lên server
    public function saveImg($req)
    {
		$disk = 'public';
		$extension = $req->file('categoryFile')->extension();
		$path=$req->categoryFile->storeAs('images','category-'.time().'.'.$extension, $disk);
		return $path;
    }
    
    //detele img trên server
    public function deleteImg($link)
    {
        $disk = 'public';
        $url = $disk."/".$link;
        Storage::delete($url);
    }

    public function delete(Request $req)
    {
        $category = Category::where('id', $req->categoryID)->first();
        if(isset($category)) {
            //xóa ảnh trong bộ nhớ server
            $url = $category->image_url;
            // xóa danh mục
            if($category->delete() > 0) {
                $this->deleteImg($url);
                return response()->json([
                    'status' => true,
                    'message' => "Xóa danh mục thành công !"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Xóa danh mục thất bại !"
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Không tìm thấy danh mục cần xóa !"
            ]);
        }
    }
}
