<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use Storage;
use DB;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ImportProduct;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function list()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::select(
            'products.id',
            'products.name',
            'products.price',
            'products.description',
            'products.quantity',
            'products.product_img',
            'products.brand_id',
            'brands.brand_name',
        )
        ->join('brands', 'brands.id', '=', 'products.brand_id')
        ->get();
        // dd($products);
        $this->addCategory($products);
        return view('admin.product', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function addCategory($arr)
    {
        foreach($arr as $item) {
            $arrName = Category::select('categories.id', 'name')->where('product_category.product_id', $item->id)
            ->join('product_category', 'product_category.category_id', '=', 'categories.id')
            ->get();
            $temp = "";
            $arrTemp = array();
            foreach($arrName as $index => $name) {
                if($index == 0) {
                    $temp .= $name->name;
                } else {
                    $temp .= ", ";
                    $temp .= $name->name;
                }
                array_push($arrTemp, $name->id);
            }
            $item->category_name = $temp;
            $item->category_id = $arrTemp;
        }
    }

    public function save(Request $req)
    {
    	// nếu tồn tại product_id tức là sửa product
    	if(isset($req->productID)) { //check tồn tại productID từ phía client
    		$product = Product::where('id', $req->productID)->first();
    		if(isset($product)) {
    			//update các giá trị mới
    			$product->name = $req->productName;
	    		$product->description = $req->productDes;
	    		$product->quantity = $req->quantity;
	    		$product->price = $req->price;
                $product->brand_id = $req->brandID;
                //cập nhật lại bảng product_category
                $this->updateProductCategory($req->productID, $req->categoryID);
	    		// trong trường hợp edit mà muốn sửa lại file hình ảnh thì mới thực hiện thay đổi ảnh
	    		if(isset($req->productFile)) {
                    $this->deleteImg($product->product_img);
                    $product->product_img = $this->saveImg($req);
	    		}
	    		// lưu dữ liệu mới
	    		$product->save();
                return redirect()->route('product');
    		} else {
                return redirect()->route('product');
    		}
    	} else {
    		//nếu không tồn tại product_id tức là tạo mới product
    		$product['name'] = $req->productName;
    		$product['quantity'] = $req->quantity;
    		$product['price'] = $req->price;
    		$product['description'] = $req->productDes;
            $product['brand_id'] = $req->brandID;
    		$product['product_img'] = $this->saveImg($req);
            $result = product::create($product);
            
            $this->createProductCategory($result->id, $req->categoryID);

            return redirect()->route('product');
    	}
    }

    // insert product to product_category table
    public function createProductCategory($productID, $arr)
    {
        if(count($arr) > 0) {
            foreach($arr as $item) {
                $data['product_id'] = $productID;
                $data['category_id'] = $item;
                ProductCategory::create($data);
            }
        }
    }

    // update info product to product_category table
    public function updateProductCategory($productID, $arr)
    {
        if(count($arr) > 0 && $this->deleteProductCategory($productID)) {
            foreach($arr as $item) {
                $data['product_id'] = $productID;
                $data['category_id'] = $item;
                ProductCategory::create($data);
            }
        }
    }

    public function deleteProductCategory($productID)
    {
        $result = ProductCategory::where('product_id', $productID)->delete();
        if($result > 0) {
            return true;
        } else {
            return false;
        }
    }

    // hàm upload ảnh lên server
    public function saveImg($req)
    {
		$disk = 'public';
		$extension = $req->file('productFile')->extension();
		$path=$req->productFile->storeAs('images','product-'.time().'.'.$extension, $disk);
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
        $product = product::where('id', $req->productID)->first();
        if(isset($product)) {
            DB::beginTransaction();
            try {
                //lấy đường dẫn ảnh trong bộ nhớ server
                $url = $product->image_url;
                // xóa data trong project_category table
                ProductCategory::where('product_id', $req->productID)->delete();
                // xóa sản phẩm
                product::where('id', $req->productID)->delete();
                // xóa ảnh trên server
                $this->deleteImg($url);

                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => "Xóa sản phẩm thành công !"
                ]);
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => "Xóa sản phẩm thất bại !"
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Không tìm thấy sản phẩm cần xóa !"
            ]);
        }
    }

    public function addQuantity(Request $req)
    {
        $data['product_id'] = $req->productID;
        $data['import_quantity'] = $req->add_quantity;
        ImportProduct::create($data);
        $product = Product::where('id', $req->productID)->first();
        $product->quantity = $product->quantity + $req->add_quantity;
        $product->save();
        return redirect()->route('product');
    }
}
