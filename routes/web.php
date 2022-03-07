<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\HotPrdController;
use App\Http\Controllers\Admin\ImagesController as AdminImagesController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\KhoNhapController;
use App\Http\Controllers\Admin\KhoXuatController;
use App\Http\Controllers\Admin\Customer_infoController as AdminCustomer_infoController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\CartCustomerController;
use App\Http\Controllers\Customer_infoController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\NewPrdController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\HotProductController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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

$prdController = ProductController::class;

Route::group(["as" => "product."], function () use ($prdController) {
    Route::get("/", "$prdController@index")->name("index");
    Route::get("/viewDetail/{id_product}/{id_color?}/{id_gb?}", "$prdController@viewDetail")->name("viewDetailName");
    Route::post("/checkStockWithQty", "$prdController@checkStockWithQty")->name("checkStockWithQty");
    Route::get("/searchAjax", "$prdController@searchAjax")->name("searchAjax");
});

$LoginUser = Account::class;
Route::group(["prefix" => "account", "as" => "account."], function () use ($LoginUser) {
    Route::get("/", "$LoginUser@index")->name("login");
    Route::get("/logout", "$LoginUser@logout")->name("logout");
    Route::post("/login", "$LoginUser@store")->name("store");
    Route::get("/create", "$LoginUser@createForm")->name("create");
    Route::post("/create/{sex?}", "$LoginUser@createSubmit")->name("createSubmit");
});

Route::group(["prefix" => "cart", "as" => "cart."], function () use ($prdController) {
    Route::get("/", "$prdController@index")->name("index");
    Route::get("/addcart/{id_product}/{id_color?}/{id_gb?}/{qty?}", "$prdController@addcart")->name("viewDetailName");
});

// Route::group(["prefix" => "account", "as" => "account."], function () use ($userController) {
//     Route::get("/", "$userController@index")->name("account.index");
// });


#Login

$adminController = AdminController::class;

Route::get('admin/login',[LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('admin/login',[LoginController::class,'store'])->name('store');
Route::get('admin/logout',[LoginController::class,'logout'])->name('admin.logout');

Route::group(["prefix" => "user_admin", "as" => "admin.", "middleware" => ['signin']], function () use ($adminController) {
    Route::get("/", "$adminController@index")->name("index");

    $prdControllerAdmin = AdminProductController::class;
    Route::group(["prefix" => "product", "as" => "product."], function () use($prdControllerAdmin) {
        Route::get("/", "$prdControllerAdmin@index")->name("index");
        Route::get("/productForm/{id_product?}", "$prdControllerAdmin@productForm")->name("productForm");
        Route::post("/productSubmit", "$prdControllerAdmin@productSubmit")->name("productSubmit");
        // Route::get("/productUpdate", "$prdControllerAdmin@productUpdate")->name("productUpdate");
        Route::get("/changeIsActive/{id_product}/{is_active}", "$prdControllerAdmin@changeIsActive")->name("changeIsActive");
        Route::get("/productDetail/{id_product?}", "$prdControllerAdmin@productDetail")->name("productDetail");
    }); 
    $KhoXuatController = KhoXuatController::class;
    Route::group(["prefix" => "khoxuat", "as" => "khoxuat."], function() use($KhoXuatController){
        Route::get("/", "$KhoXuatController@index")->name("index");
        Route::get("/khoXuatForm", "$KhoXuatController@khoXuatForm")->name("khoXuatForm");
        Route::post("/khoXuatSubmit", "$KhoXuatController@khoXuatSubmit")->name("khoXuatSubmit");
       
       Route::get("/khoXuatDetail/{id?}", "$KhoXuatController@khoXuatDetail")->name("khoXuatDetail");
    });

    //Brand
    $BrandControllerAdmin = BrandController::class;
    Route::group(["prefix" => "brand", "as" => "brand."], function () use($BrandControllerAdmin) {
        Route::get("/", "$BrandControllerAdmin@index")->name("index");
        Route::get("/brandForm", "$BrandControllerAdmin@brandForm")->name("brandForm");
        Route::post("/brandSubmit", "$BrandControllerAdmin@brandSubmit")->name("brandSubmit");
        Route::get("/changeIsActive/{id_brand}/{is_active}", "$BrandControllerAdmin@changeIsActive")->name("changeIsActive");
    });
    //HotPrd
    $HotPrdControllerAdmin = HotPrdController::class;
    Route::group(["prefix" => "hot_product", "as" => "hot_product."], function () use($HotPrdControllerAdmin) {
        Route::get("/", "$HotPrdControllerAdmin@index")->name("index");
        Route::get("/HotPrdForm/{id_hot_product?}", "$HotPrdControllerAdmin@HotPrdForm")->name("HotPrdForm");
        Route::post("/HotPrdSubmit", "$HotPrdControllerAdmin@HotPrdSubmit")->name("HotPrdSubmit");
    });
    // dd($HotPrdControllerAdmin);

    $ImagesControllerAdmin = AdminImagesController::class;
    Route::group(["prefix" => "images", "as" => "images."], function () use($ImagesControllerAdmin) {
        Route::get("/", "$ImagesControllerAdmin@index")->name("index");
    });
    // dd($ImagesControllerAdmin);
    
    $BillControllerAdmin = BillController::class;
    Route::group(["prefix" => "bill", "as" => "bill."], function () use($BillControllerAdmin) {
        Route::get("/", "$BillControllerAdmin@index")->name("index");
        Route::get("/billForm/{id_bill?}", "$BillControllerAdmin@billForm")->name("billForm");
        Route::post("/billSubmit", "$BillControllerAdmin@billSubmit")->name("billSubmit");
        Route::get("/changeIsActive/{id_bill}/{is_active}", "$BillControllerAdmin@changeIsActive")->name("changeIsActive");
        Route::get("/billDetail/{id_bill?}", "$BillControllerAdmin@billDetail")->name("billDetail");
    });
    // dd($BillControllerAdmin);

    $Customer_infoControllerAdmin = AdminCustomer_infoController::class;
    Route::group(["prefix" => "Customer_info", "as" => "Customer_info.", "middleware" => ["accessrole"]], function () use($Customer_infoControllerAdmin) {
        Route::get("/", "$Customer_infoControllerAdmin@index")->name("index");
        Route::get("/Customer_infoForm/{id_customer_info?}", "$Customer_infoControllerAdmin@Customer_infoForm")->name("Customer_infoForm");
        Route::post("/Customer_infoSubmit", "$Customer_infoControllerAdmin@Customer_infoSubmit")->name("Customer_infoSubmit");
        Route::get("/changeIsActive/{id_customer_info}/{is_active}", "$Customer_infoControllerAdmin@changeIsActive")->name("changeIsActive");
    });
    //  dd($Customer_infoControllerAdmin);


    $FeedbackControllerAdmin = AdminFeedbackController::class;
    Route::group(["prefix" => "Feedback", "as" => "Feedback."], function () use($FeedbackControllerAdmin) {
        Route::get("/", "$FeedbackControllerAdmin@index")->name("index");
        Route::get("/FeedbackForm", "$FeedbackControllerAdmin@FeedbackForm")->name("FeedbackForm");
        Route::post("/FeedbackSubmit", "$FeedbackControllerAdmin@FeedbackSubmit")->name("FeedbackSubmit");
    });



     $SuperAdminControllerAdmin = SuperAdminController::class;
     Route::group(["prefix" => "SuperAdmin", "as" => "SuperAdmin.", "middleware" => ["accessrole"]], function() use($SuperAdminControllerAdmin){
         Route::get("/", "$SuperAdminControllerAdmin@index")->name("index");
         Route::get("/SuperAdminForm", "$SuperAdminControllerAdmin@SuperAdminForm")->name("SuperAdminForm");
         Route::post("/SuperAdminSubmit", "$SuperAdminControllerAdmin@SuperAdminSubmit")->name("SuperAdminSubmit");
         Route::get("/changeIsActive/{id_admin}/{is_active}", "$SuperAdminControllerAdmin@changeIsActive")->name("changeIsActive");
        Route::get("/SuperAdminDetail/{id_admin?}", "$SuperAdminControllerAdmin@SuperAdminDetail")->name("SuperAdminDetail");
     });
     
    

    
  
  
    
    
    $CartCustomerControllerAdmin = CartCustomerController::class;
    Route::group(["prefix" => "CartCustomer", "as" => "CartCustomer."], function () use($CartCustomerControllerAdmin) {
        Route::get("/", "$CartCustomerControllerAdmin@index")->name("index");
    });

    $NewPrdControllerAdmin = NewPrdController::class;
    Route::group(["prefix" => "NewPrd", "as" => "NewPrd."], function () use($NewPrdControllerAdmin) {
        Route::get("/", "$NewPrdControllerAdmin@index")->name("index");
    });
    // Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {  
    //     Route::get('/','admin\Controlleradmin@login' )->name('login_name');
    //     Route::post('/login','admin\Controlleradmin@login_process')->name('login_process');
    //     Route::get('logout','admin\Controlleradmin@logout')->name('logout_name');
    //     Route::group(['prefix' => 'Home_admin','middleware'=>['dangnhap'] ], function () {
    //         Route::get('/','admin\Controlleradmin@index' )->name('home'); 
    // }); 
}); 
// $UserController = UserController::class;
// Route::get('user/login',[UserController::class,'showLoginForm'])->name('user.login');
// Route::post('user/login',[UserController::class,'storeuser'])->name('storeuser'); 
// Route::get('user/logout',[UserController::class,'logout'])->name('user.logout');

// Route::group(["prefix" => "home", "as" => "user."], function () use ($UserController) {
//         Route::get("/", "$UserController@index")->name("index");
    
//     });