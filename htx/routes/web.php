<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//trang-chu
Route::get('/', [App\Http\Controllers\UserController::class, 'getIndex'])->name("index");

//banner
// Route::get('/banner', [App\Http\Controllers\UserController::class, 'getBanner'])->name("getBanner");
// Route::get('/post/add', [App\Http\Controllers\PostController::class, 'add'])->name("add");
/* =============================================USER=======================================*/
// tất cả code nằm trong userController
//dang nhap google

//loai san pham & chi tiet san pham & tim kiem & tat ca san pham
Route::get('/san-pham', [App\Http\Controllers\UserController::class, 'getProduct'])->name("product");
Route::get('/chi-tiet-san-pham/{id}', [App\Http\Controllers\UserController::class, 'getDetailProduct'])->name("detailProduct");

//loai phong & chi tiet phong & tim kiem & tat ca phong
Route::get('/phong', [App\Http\Controllers\UserController::class, 'getRoom'])->name("room");
Route::get('/chi-tiet-phong/{id}', [App\Http\Controllers\UserController::class, 'getDetailRoom'])->name("detailRoom");

//loai tour & chi tiet tour & tim kiem & tat ca tour
Route::get('/tour', [App\Http\Controllers\UserController::class, 'getTour'])->name("tour");
Route::get('/chi-tiet-tour/{id}', [App\Http\Controllers\UserController::class, 'getDetailTour'])->name("detailTour");

//lien he & gioi thieu &tin tuc
//1. gioi thieu
Route::get('/gioi-thieu', [App\Http\Controllers\UserController::class, 'getIntro'])->name("intro");
//2. tin tuc
Route::get('/tin-tuc', [App\Http\Controllers\UserController::class, 'getNews'])->name("news");
Route::get('/chi-tiet-tin-tuc/{id}', [App\Http\Controllers\UserController::class, 'getDetailNews'])->name("getDetailNews");

//3. lien he
Route::get('/lien-he', [App\Http\Controllers\UserController::class, 'getContact'])->name("contact");
Route::post('/gui-lien-he', [App\Http\Controllers\UserController::class, 'postContact'])->name("postContact");
//cam nang
Route::get('/cam-nang-du-lich', [App\Http\Controllers\UserController::class, 'getTipTravel'])->name("tipTravel");

//gio  hang
Route::get('/chi-tiet-gio-hang', [App\Http\Controllers\UserController::class, 'getCart'])->name('getCart');
Route::post('/them-gio-hang/{productId}', [App\Http\Controllers\UserController::class, 'addToCart'])->name('addToCart');
Route::post('/xoa-gio-hang/{productId}', [App\Http\Controllers\UserController::class, 'removeFromCart'])->name('removeFromCart');
Route::post('/update-cart/{productId}', 'UserController@updateCart')->name('updateCart');

Route::post('/them-gio-hang/{roomId}', [App\Http\Controllers\UserController::class, 'addToCart1'])->name('addToCart1');
Route::post('/xoa-gio-hang/{roomId}', [App\Http\Controllers\UserController::class, 'removeFromCart1'])->name('removeFromCart1');
Route::post('/update-cart/{roomId}', 'UserController@updateCart')->name('updateCart');

Route::post('/them-gio-hang/{tourId}', [App\Http\Controllers\UserController::class, 'addToCart2'])->name('addToCart2');
Route::post('/xoa-gio-hang/{tourId}', [App\Http\Controllers\UserController::class, 'removeFromCart2'])->name('removeFromCart2');
Route::post('/update-cart/{tourId}', 'UserController@updateCart')->name('updateCart');
//kiem tra thong tin
Route::get('/thong-tin-dat-hang', [App\Http\Controllers\UserController::class, 'getCheckout'])->name('getCheckout');
Route::post('/checkout',[App\Http\Controllers\UserController::class, 'postCheckout'])->name('postCheckout');

// trang dat hang
Route::get('/thanh-toan', [App\Http\Controllers\UserController::class, 'getSuccess'])->name('getSuccess');

// dich vu
Route::get('/dich-vu', [App\Http\Controllers\UserController::class, 'getService'])->name('getService');
Route::get('/chi-tiet-phong', [App\Http\Controllers\UserController::class, 'getDetailRoom'])->name('getDetailRoom');
Route::get('/dat-tour', [App\Http\Controllers\UserController::class, 'getTour'])->name('getTour');

//tai khoan
//1.  dang nhap
Route::get('/dang-nhap', [App\Http\Controllers\AccountAuthController::class, 'getLogin'])->name('getLogin');
// Route::post('/post-dang-nhap', [App\Http\Controllers\AccountAuthController::class, 'postLogin'])->name('postLogin');
Route::post('/dang-nhap', [App\Http\Controllers\AccountAuthController::class, 'postLogin'])->name('postLogin');

// Tuyến đường đăng ký
Route::get('/dang-ky', [App\Http\Controllers\AccountAuthController::class, 'getRegister'])->name('getRegister');
Route::post('/dang-ky', [App\Http\Controllers\AccountAuthController::class, 'postRegister'])->name('postRegister');
//2. dang xuat
Route::get('/logout', [App\Http\Controllers\AccountAuthController::class, 'logout'])->name('logout');

//login admin
Route::get('/admin-login', [App\Http\Controllers\AccountAuthController::class, 'loginAdmin'])->name("login");





/* =============================================ADMIN=======================================*/
Route::middleware('admin')->group(function () {

    //dashboard -- nơi đây thống kê số nguời dùng , sp bán chạy, tài khoan -> adminController

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'getDashBoard'])->name("adminDashboard");

    //user --ql tài khoản như thêm sửa xóa phân quyền -> AccountController
    Route::get('/tai-khoan', [App\Http\Controllers\AccountController::class, 'listAccount'])->name("listAccount");
    Route::get('/them-tai-khoan', [App\Http\Controllers\AccountController::class, 'addAccount'])->name("addAccount");
    Route::get('/sua-tai-khoan/{id}', [App\Http\Controllers\AccountController::class, 'edit'])->name("editAccount");
    Route::post('/cap-nhat-tai-khoan/{id}', [App\Http\Controllers\AccountController::class, 'updateDemo'])->name("updateDemo");
    Route::get('/xoa-tai-khoan/{id}', [App\Http\Controllers\AccountController::class, 'delete'])->name("deleteAccount");
    Route::post('/tim-tai-khoan', [App\Http\Controllers\AccountController::class, 'search'])->name('searchAccount');
    Route::post('/luu-tai-khoan', [App\Http\Controllers\AccountController::class, 'storeDemo'])->name('storeAccount');


    //slide -- baner thêm sửa xóa -> BannerController
    Route::get('/banner', [App\Http\Controllers\BannerController::class, 'listBanner'])->name("listBanner");
    Route::get('/them-banner', [App\Http\Controllers\BannerController::class, 'addBanner'])->name("addBanner");
    Route::get('/delete-banner/{id}', [App\Http\Controllers\BannerController::class, 'delete'])->name('deleteBanner');
    Route::post('/luu-banner', [App\Http\Controllers\BannerController::class, 'storeBanner'])->name("storeBanner");
    Route::post('/tim-banner', [App\Http\Controllers\BannerController::class, 'searchBanner'])->name('searchBanner');
    Route::get('/edit-banner/{id}', [App\Http\Controllers\BannerController::class, 'edit'])->name('editBanner');
    Route::post('/update-banner/{id}', [App\Http\Controllers\BannerController::class, 'update'])->name('updateBanner');

    //thuong hieu san pham: add, del, edit,searh --> ProductTypeController
    Route::get('/thuong-hieu-san-pham', [App\Http\Controllers\ProductTypeController::class, 'getProductType'])->name("productType");
    Route::get('/them-thuong-hieu-san-pham', [App\Http\Controllers\ProductTypeController::class, 'addProductType'])->name("addProductType");
    Route::get('/xoa-thuong-hieu-san-pham/{id}', [App\Http\Controllers\ProductTypeController::class, 'deleteProductType'])->name("deleteProductType");
    Route::post('/tim-thuonghieu', [App\Http\Controllers\ProductTypeController::class, 'searchProductType'])->name('searchProductType');
    Route::post('/luu-thuong-hieu', [App\Http\Controllers\ProductTypeController::class, 'storeCategory'])->name("storeCategory");
    Route::get('/edit-category/{id}', [App\Http\Controllers\ProductTypeController::class, 'edit'])->name('editCategory');
    Route::post('/update-category/{id}', [App\Http\Controllers\ProductTypeController::class, 'update'])->name('updateCategory');


    //san pham  add, del, edit,searh --> ProductControllerd}
    Route::get('/admin-san-pham', [App\Http\Controllers\ProductController::class, 'getProduct'])->name("getProduct");
    Route::get('/them-san-pham', [App\Http\Controllers\ProductController::class, 'addProduct'])->name("addProduct");
    Route::post('/luu-san-pham', [App\Http\Controllers\ProductController::class, 'storeProductDemo'])->name("storeProductDemo");
    Route::get('/xoa-san-pham/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->name("deleteProduct");
    Route::get('/sua-san-pham/{id}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name("editProduct");
    Route::post('/cap-nhat-san-pham/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name("updateProduct");
    Route::post('/tim-san-pham', [App\Http\Controllers\ProductController::class, 'searchProduct'])->name('searchProduct');

    //don hang add, del, edit,searh, detail order --> OrderController
    Route::get('/admin-don-hang', [App\Http\Controllers\OrderController::class, 'getOrder'])->name("getOrder");

    //lien he: xem thong tin lien he nguoi dung gui --> ContactController
    Route::get('/admin-lien-he', [App\Http\Controllers\ContactController::class, 'getContact'])->name("getContact");
    Route::get('/delete-lien-he/{id}', [App\Http\Controllers\ContactController::class, 'deleteContact'])->name('deleteContact');

    //tin tuc: add, del, edit,searh --> NewsController
    Route::get('/admin-tin-tuc', [App\Http\Controllers\NewsController::class, 'getNews'])->name("getNews");
    Route::get('/them-tin-tuc', [App\Http\Controllers\NewsController::class, 'addNews'])->name("addNews");
    //them tin tuc: add, del, edit,searh --> NewsController
    Route::post('/luu-tin-tuc', [App\Http\Controllers\NewsController::class, 'store'])->name("storeNews");
    Route::get('/delete-news/{id}', [App\Http\Controllers\NewsController::class, 'delete'])->name('deleteNews');
    Route::post('/admin-tin-tuc', [App\Http\Controllers\NewsController::class, 'searchNews'])->name('searchNews');
    Route::get('/edit-news/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('editNews');
    Route::post('/update-news/{id}', [App\Http\Controllers\NewsController::class, 'update'])->name('updateNews');


    // cam nang du lich: add, del, edit,searh --> tipTravelController
    Route::get('/admin-cam-nang', [App\Http\Controllers\TipController::class, 'listTip'])->name("listTip");
    Route::get('/them-cam-nang', [App\Http\Controllers\TipController::class, 'addTip'])->name("addTip");
});

Route::get('/oauth/github', function () {
    return Laravel\Socialite\Facades\Socialite::driver('github')->redirect();
});

Route::get('/oauth/callback/github', function () {
    $data_from_github = Laravel\Socialite\Facades\Socialite::driver('github')->user();

    // dd(App\Models\User::where('email', $data_from_github->email)->first());
    if (App\Models\User::where('email', $data_from_github->email)->first() == null) {
        $user = new App\Models\User();
        $user->name = $data_from_github->user['login'];
        $user->email = $data_from_github->user['email'];
        $user->save();
    }

    Auth::login(App\Models\User::where('email', $data_from_github->email)->first());

    return redirect()->route('index')->with('success', 'Login successful!');
    // dd($user);

    // return redirect('/');
});
// vnpay
Route::post('/thanh-toan-vnpay', [App\Http\Controllers\UserController::class, 'getSuccessVnpay'])->name('getSuccessVnpay');
