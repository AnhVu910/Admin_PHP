<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatisticController;
use App\Http\Middleware\checkAdminLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('user.home');
Route::post('/forgot', [AdminController::class, 'forgotPass'])->name('forgot-password');
// Route::get('/about', [FrontendController::class, 'about'])->name('user.about');
// Route::get('/contact', [FrontendController::class, 'contact'])->name('user.contact');
// Route::post('/add-order', [FrontendController::class, 'addOrder']);
// Route::prefix('user-info')->group(function(){
//     Route::get('/', [FrontendController::class, 'info'])->name('user.info');
//     Route::post('/update', [FrontendController::class, 'updateInfo']);
// });
// Route::prefix('cart')->group(function(){
//     Route::get('/', [FrontendController::class, 'cart'])->name('user.cart');
//     Route::post('/delete', [FrontendController::class, 'deleteItem']);
//     Route::post('/update', [FrontendController::class, 'updateQuantity']);
//     Route::post('/apply-coupon', [FrontendController::class, 'applyCoupon']);
//     Route::post('/payment', [FrontendController::class, 'payment']);
// });
// Route::prefix('product')->group(function(){
//     Route::get('/', [FrontendController::class, 'product'])->name('user.product');
//     Route::get('/category/{id}/', [FrontendController::class, 'productInCategory'])
//     ->name('user.productInCategory');
//     Route::get('/product-detail/{id}/', [FrontendController::class, 'productDetail']);
//     Route::post('/search', [FrontendController::class, 'search']);
//     Route::post('/add-into-cart', [FrontendController::class, 'addIntoCart']);
// });

// Route::get('/test', function () {return view('frontend.product-detail');})->name('test');

Route::middleware([checkAdminLogin::class])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::post('/change-password', [AdminController::class, 'changePass'])->name('admin.change-password');
        Route::post('/update-system', [AdminController::class, 'updateSystem']);
        Route::prefix('user')->group(function(){
            Route::get('/', [UserController::class, 'list'])->name('user');
            Route::post('/role', [UserController::class, 'changeRole']);
            Route::post('/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/add', [UserController::class, 'add'])->name('user.add');
            Route::post('/delete', [UserController::class, 'delete']);
        });
        Route::prefix('customer')->group(function(){
            Route::get('/', [UserController::class, 'customerList'])->name('customer');
            // Route::post('/role', [UserController::class, 'changeRole']);
            Route::post('/edit', [UserController::class, 'customerEdit'])->name('customer.edit');
            Route::post('/add', [UserController::class, 'customerAdd'])->name('customer.add');
            // Route::post('/delete', [UserController::class, 'delete']);
        });
        // Route::prefix('category')->group(function(){
        //     Route::get('/', [CategoryController::class, 'list'])->name('category');
        //     Route::post('/save', [CategoryController::class, 'save']);
        //     Route::post('/delete', [CategoryController::class, 'delete']);
        // });
        // Route::prefix('brand')->group(function(){
        //     Route::get('/', [BrandController::class, 'list'])->name('brand');
        //     Route::post('/save', [BrandController::class, 'save']);
        //     Route::post('/delete', [BrandController::class, 'delete']);
        // });
        // Route::prefix('coupon')->group(function(){
        //     Route::get('/', [CouponController::class, 'list'])->name('coupon');
        //     Route::post('/save', [CouponController::class, 'save']);
        //     Route::post('/delete', [CouponController::class, 'delete']);
        // });
        // Route::prefix('product')->group(function(){
        //     Route::get('/', [ProductController::class, 'list'])->name('product');
        //     Route::post('/save', [ProductController::class, 'save']);
        //     Route::post('/add-quantity', [ProductController::class, 'addQuantity']);
        //     Route::post('/delete', [ProductController::class, 'delete']);
        // });
        // Route::prefix('order')->group(function(){
        //     Route::get('/', [OrderController::class, 'list'])->name('order');
        //     Route::post('/change-state', [OrderController::class, 'changeState']);
        // });
        // Route::prefix('statistical')->group(function(){
        //     Route::get('/', [StatisticController::class, 'list'])->name('statistical');
        //     Route::get('/get-revenue', [StatisticController::class, 'getRevenue']);
        //     Route::get('/get-revenue-by-date', [StatisticController::class, 'getRevenueByDate']);
        // });
    });
});