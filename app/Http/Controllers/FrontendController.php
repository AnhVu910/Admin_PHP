<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Order;
use App\Models\ProductSold;
use Illuminate\Routing\Redirector;
use Auth;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function home()
    {
        return redirect(route('admin'));
        $news = Product::orderBy('updated_at', 'DESC')->offset(0)->limit(8)->get();
        $categories = Category::all();
        $info = System::where('id', 1)->first();
        $cart = isset(Auth::user()->id) ? Cart::where('user_id', Auth::user()->id)->count() : null;
        return view('frontend.home', [
            'info' => $info,
            'news' => $news,
            'cart' => $cart,
            'categories' => $categories
        ]);
    }

    public function product()
    {
        $products = Product::all();
        $categories = Category::all();
        $info = System::where('id', 1)->first();
        $cart = isset(Auth::user()->id) ? Cart::where('user_id', Auth::user()->id)->count() : null;
        return view('frontend.product', [
            'info' => $info,
            'products' => $products,
            'cart' => $cart,
            'categories' => $categories
        ]);
    }

    public function productInCategory($categoryID)
    {
        $products = Product::join('product_category', 'products.id', '=', 'product_category.product_id')
        ->where('product_category.category_id', $categoryID)->get();
        $categories = Category::all();
        $info = System::where('id', 1)->first();
        $cart = isset(Auth::user()->id) ? Cart::where('user_id', Auth::user()->id)->count() : null;
        return view('frontend.product', [
            'info' => $info,
            'cart' => $cart,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function productDetail($productID)
    {
        $product = Product::where('id', $productID)->first();
        $categories = Category::all();
        $info = System::where('id', 1)->first();
        $cart = isset(Auth::user()->id) ? Cart::where('user_id', Auth::user()->id)->count() : null;
        $categoryID = ProductCategory::where('product_id', $productID)->value('category_id');
        $recommendProduct = Product::select(
            'products.id',
            'products.name',
            'products.description',
            'products.product_img'
        )
        ->join('product_category', 'products.id', '=', 'product_category.product_id')
        ->where('product_category.category_id', $categoryID)->offset(0)->limit(4)->get();
        if(isset($product)) {
            return view('frontend.product-detail', [
                'info' => $info,
                'cart' => $cart,
                'product' => $product,
                'recommends' => $recommendProduct,
                'categories' => $categories
            ]);
        } else {
            return abort(404);
        }
    }

    public function search(Request $req)
    {
        $categories = Category::all();
        $info = System::where('id', 1)->first();
        $cart = isset(Auth::user()->id) ? Cart::where('user_id', Auth::user()->id)->count() : null;
        $products = Product::where('name', 'LIKE', "%{$req->search}%")->get();
        return view('frontend.product', [
            'info' => $info,
            'cart' => $cart,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function about()
    {
        $info = System::where('id', 1)->first();
        $cart = isset(Auth::user()->id) ? Cart::where('user_id', Auth::user()->id)->count() : null;
        return view('frontend.about', [
            'cart' => $cart,
            'info' => $info
        ]);
    }

    public function info()
    {
        $info = System::where('id', 1)->first();
        if (isset(Auth::user()->id)) {
            $data = UserInfo::where('user_id', Auth::user()->id)->first();
            $user = User::select('name', 'email')->where('id', Auth::user()->id)->first();
        } else {
            $data = null;
            $user = null;
        }
        $cart = isset(Auth::user()->id) ? Cart::where('user_id', Auth::user()->id)->count() : null;
        return view('frontend.checkout', [
            'cart' => $cart,
            'user' => $user,
            'data' => $data,
            'info' => $info
        ]);
    }

    public function updateInfo(Request $req)
    {
        if(isset($req->name)) {
            $user = User::where('id', Auth::user()->id)->first();
            $user->name = $req->name;
            $user->save();
        }
        if (isset($req->address) && isset($req->phone) && isset($req->city)) {
            if(UserInfo::where('user_id', Auth::user()->id)->count() > 0) {
                $data = UserInfo::where('user_id', Auth::user()->id)->first();
                $data->address = $req->address;
                $data->city = $req->city;
                $data->phone = $req->phone;
                $data->save();
                return response()->json(['status' => true]);
            } else {
                $info['address'] = $req->address;
                $info['city'] = $req->city;
                $info['phone'] = $req->phone;
                $info['user_id'] = Auth::user()->id;
                UserInfo::create($info);
                return response()->json(['status' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function contact()
    {
        $info = System::where('id', 1)->first();
        $cart = isset(Auth::user()->id) ? Cart::where('user_id', Auth::user()->id)->count() : null;
        return view('frontend.contact', [
            'cart' => $cart,
            'info' => $info
        ]);
    }

    public function cart()
    {
        if (isset(Auth::user()->id)) {
            $info = System::where('id', 1)->first();
            $cart = Cart::where('user_id', Auth::user()->id)->count();
            $products = Cart::select(
                'carts.id',
                'carts.quantity',
                'carts.product_id',
                'products.price',
                'products.product_img',
                'products.name',
                'products.description'
            )
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', Auth::user()->id)->get();
            return view('frontend.cart', [
                'cart' => $cart,
                'products' => $products,
                'info' => $info
            ]);
        } else {
            $info = System::where('id', 1)->first();
            return view('frontend.cart', [
                'info' => $info
            ]);
        }
    }

    public function addIntoCart(Request $req)
    {
        $data['user_id'] = Auth::user()->id;
        $data['product_id'] = $req->productID;
        $data['quantity'] = isset($req->quantity) ? $req->quantity : 1;
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $req->productID)->first();
        if (isset($cart)) {
            $cart->quantity = $cart->quantity + 1;
            $cart->save();
            return response()->json([
                'status' => true,
                'add' => false,
                'message' => 'Đã thêm vào giỏ hàng'
            ]);
        } else {
            if (Cart::create($data) != null) {
                return response()->json([
                    'status' => true,
                    'add' => true,
                    'message' => 'Đã thêm vào giỏ hàng'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Xảy ra lỗi, vui lòng thử lại'
                ]);
            }
        }
    }

    public function deleteItem(Request $req)
    {
        if (Cart::where('id', $req->itemID)->delete()) {
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function updateQuantity(Request $req)
    {
        $percent = 0;
        $cart = Cart::where('id', $req->itemID)->first();
        $checkQuantity = Cart::join('products', 'products.id', '=', 'carts.product_id')
        ->where('carts.id', $req->itemID)->value('products.quantity');
        if ($req->coupon != null) {
            $check = Coupon::where('code', $req->coupon)->value('percent');
            $percent = isset($check) ? $check : 0;
        }
        if (isset($cart) && $req->quantity <= $checkQuantity) {
            $cart->quantity = $req->quantity;
            $cart->save();
            return response()->json([
                'status' => true,
                'percent' => $percent
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function applyCoupon(Request $req)
    {
        $now = Carbon::now();
        $percent = Coupon::where('code', $req->coupon)->value('percent');
        $date = Coupon::where('code', $req->coupon)->value('expired');
        $end = new Carbon($date);
        if (isset($percent) && $now < $end) {
            return response()->json([
                'status' => true,
                'percent' => $percent
            ]);
        } else {
            return response()->json([
                'status' => false,
                'percent' => 0
            ]);
        }
    }

    public function payment(Request $req)
    {
        // 0 - order
        // 1 - online payment
        $data = array();
        if($req->method == 0) {
            // 0 is order
            if (isset($req->street) && isset($req->district) && isset($req->city)) {
                $data['address'] = $req->street." - ".$req->district." - ".$req->city;
                $data['total'] = $req->total;
                $data['discount'] = $req->discount;
                $data['name'] = Auth::user()->name;
                $data['email'] = Auth::user()->email;
                $data['phone'] = UserInfo::where('user_id', Auth::user()->id)->value('phone');
                $products = Cart::select(
                    'products.id',
                    'products.name',
                    'products.price',
                    'carts.quantity'
                )
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->where('user_id', Auth::user()->id)->get();
                foreach($products as $index => $item) {
                    $temp = $item->name." * (SL: ".$item->quantity.")";
                    $data['content'][$index] = $temp;
                }
                return $this->order($data);
            } else {
                $user = UserInfo::where('user_id', Auth::user()->id)->first();
                if(isset($user->address)) {
                    $data['address'] = $user->address." - ".$user->city;
                    $data['total'] = $req->total;
                    $data['discount'] = $req->discount;
                    $data['name'] = Auth::user()->name;
                    $data['email'] = Auth::user()->email;
                    $data['phone'] = $user->phone;
                    $products = Cart::select(
                        'products.id',
                        'products.name',
                        'products.price',
                        'carts.quantity'
                    )
                    ->join('products', 'products.id', '=', 'carts.product_id')
                    ->where('user_id', Auth::user()->id)->get();
                    foreach($products as $index => $item) {
                        $temp = $item->name." * (SL : ".$item->quantity.")";
                        $data['content'][$index] = $temp;
                    }
                    return $this->order($data);
                } else {
                    return redirect()->route('user.info');
                }
            }
        } else {
            // 1 is online payment
            return null;
        }
        return view('frontend.order');
    }

    public function order($data)
    {
        $info = System::where('id', 1)->first();
        $cart = Cart::where('user_id', Auth::user()->id)->count();
        return view('frontend.order', [
            'data' => $data,
            'cart' => $cart,
            'info' => $info
        ]);
    }

    public function addOrder(Request $req)
    {
        $order['customer_name'] = $req->data['name'];
        $order['phone'] = $req->data['phone'];
        $order['email'] = $req->data['email'];
        $order['address'] = $req->data['address'];
        $order['total'] = $req->data['total'];
        if(isset($req->data['discount'])) {
            $order['discount'] = $req->data['discount'];
        } else {
            $order['discount'] = 0;
        }
        // default state is 0 : waiting for payment
        $order['state'] = 0;
        $order['products'] = $this->getProductInCart(Auth::user()->id);
        $result = Order::create($order);
        if(isset($result->id)) {
            // thêm vào bảng sản phẩm đã bán để thực hiện thống kê
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            foreach($cart as $item) {
                $data['order_id'] = $result->id;
                $data['product_id'] = $item->product_id;
                $data['product_quantity'] = $item->quantity;
                ProductSold::create($data);
            }
            $this->updateQuantityProduct(Auth::user()->id);
            Cart::where('user_id', Auth::user()->id)->delete();

            return response()->json([
                'status' => true,
                'message' => "Tạo đơn hàng thành công, Vui lòng chờ đơn vị vận chuyển giao hàng đến vị trí của bạn"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Tạo đơn hàng thất bại, Vui lòng thử lại"
            ]);
        }
    }

    public function getProductInCart($userID)
    {
        $data = "";
        $products = Cart::select(
            'products.name',
            'products.price',
            'carts.quantity'
        )
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->where('user_id', $userID)->get();
        foreach($products as $index => $item) {
            $temp = $item->name." (SL : ".$item->quantity." x ".$item->price."); ";
            $data .= $temp;
        }
        return $data;
    }

    public function updateQuantityProduct($userID)
    {
        $products = Cart::select(
            'products.id',
            'carts.quantity'
        )
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->where('user_id', $userID)->get();
        foreach($products as $item) {
            $data = Product::where('id', $item->id)->first();
            $data->quantity = $data->quantity - $item->quantity;
            $data->save();
        }
    }
}
