<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentresController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::any('/CreateAccount','App\Http\Controllers\AccountController@ValidateAccount');
Route::any('/ValidateAccount','App\Http\Controllers\AccountController@CheckMyAccount');
Route::any('/Account/register','App\Http\Controllers\AccountController@RegisterAccount');

Auth::routes();

Route::match(['get','post'],'forgot-password',[App\Http\Controllers\Admin\AdminController::class, 'forgotPassword']);
Route::group(['middleware'=>['admin']],function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('/Dashboard','App\Http\Controllers\HomeController@Dashboard');
Route::any('/departments','App\Http\Controllers\HomeController@Departments');
Route::any('/makereports', [App\Http\Controllers\HomeController::class, 'makereports']);
Route::any('/allpurchases',[\App\Http\Controllers\PurchasesController::class,'allPurchases']);
Route::any('allstocks',[\App\Http\Controllers\PurchasesController::class,'allStocks']);


Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
Route::match(['get','post'],'fetchcategories',[App\Http\Controllers\CategoriesController::class, 'fetchList']);
Route::resource('products',\App\Http\Controllers\ProductsController::class);
Route::match(['get','post'],'fetchproducts',[App\Http\Controllers\ProductsController::class, 'fetchProducts']);
Route::resource('centres', \App\Http\Controllers\CentresController::class);
Route::resource('suppliers', \App\Http\Controllers\SuppliersController::class);
Route::match(['get','post'],'fetchcentres',[App\Http\Controllers\CentresController::class, 'fetchCentres']);
Route::resource('items', \App\Http\Controllers\ItemsController::class);
Route::match(['get','post'],'fetchitems',[App\Http\Controllers\ItemsController::class, 'fetchItems']);
Route::any('item/catyegory/getProducts/{id}',[\App\Http\Controllers\ProductsController::class,'cascadeProducts']);
Route::any('item/product/getItems/{id}',[\App\Http\Controllers\ItemsController::class,'cascadeItems']);
Route::any('item/product/getStocks/{id}',[\App\Http\Controllers\ItemsController::class,'cascadeStocks']);
Route::resource('purchases',\App\Http\Controllers\PurchasesController::class);
Route::resource('store',\App\Http\Controllers\StoreController::class);
Route::any('supplier/details/{id}',[\App\Http\Controllers\ItemsController::class,'Populate']);
Route::any('stock/quantity/{id}',[\App\Http\Controllers\ItemsController::class,'stockQuantity']);
Route::resource('transactions',\App\Http\Controllers\TransactionsController::class);
Route::resource('orderdetails',\App\Http\Controllers\OrderDetailsController::class);
Route::resource('stock',\App\Http\Controllers\StockController::class);
Route::any('/adjustmentvalue',[\App\Http\Controllers\StockController::class ,'Adjustmentvalue']);
Route::any('/produceS13/{id}',[\App\Http\Controllers\StockController::class ,'ProduceS13']);
Route::get('/approve',[\App\Http\Controllers\StoreController::class ,'approveOrder']);
Route::any('/rejectionReason',[\App\Http\Controllers\StoreController::class ,'RejectionReason']);
Route::post('/approval',[\App\Http\Controllers\StoreController::class ,'approval']);
Route::any('/blacklist/{id}',[\App\Http\Controllers\SuppliersController::class ,'Blacklist']);
Route::any('/contact/{id}',[\App\Http\Controllers\SuppliersController::class ,'Contact']);
Route::any('/reinstate/{id}',[\App\Http\Controllers\SuppliersController::class ,'Reinstate']);
Route::get('/issuedlist',[\App\Http\Controllers\StoreController::class ,'issuedList']);
Route::post('/dispatch/{id}',[\App\Http\Controllers\StoreController::class ,'issueItem']);
Route::get('/allrequests',[\App\Http\Controllers\StoreController::class ,'fetchAllRequests']);
Route::get('/approvedlist',[\App\Http\Controllers\StoreController::class ,'approvedList']);
Route::get('/pendinglist',[\App\Http\Controllers\StoreController::class ,'pendingList']);
Route::get('/rejectedlist',[\App\Http\Controllers\StoreController::class ,'rejectedList']);
Route::post('/reject',[\App\Http\Controllers\StoreController::class ,'reject']);
Route::any('/contactsupplers',[\App\Http\Controllers\SuppliersController::class ,'index2']);
Route::resource('cart',\App\Http\Controllers\CartController::class);
Route::any('addtocart',[\App\Http\Controllers\CartController::class,'addTocart']);
Route::any('fetchpurchases',[\App\Http\Controllers\PurchasesController::class, 'fetchPurchases']);
Route::any('fetchstock',[\App\Http\Controllers\PurchasesController::class, 'fetchStock']);
Route::any('fetchsuppliers',[\App\Http\Controllers\SuppliersController::class, 'fetchSuppliers']);
Route::any('fetchtransactions',[\App\Http\Controllers\TransactionsController::class, 'fetchTransactions']);
Route::any('fetchallpurchases',[\App\Http\Controllers\PurchasesController::class, 'fetchallpurchases']);
Route::any('fetchallstock',[\App\Http\Controllers\PurchasesController::class, 'fetchallstock']);




});

Route::get('logout', 'Auth\LoginController@logout');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::prefix('/admin')->namespace('Admin')->group(function(){

    Route::get('/registerform',[\App\Http\Controllers\Admin\AdminController::class,'registerFormShow']);
    Route::post('register',[App\Http\Controllers\Admin\AdminController::class, 'registerAdmin']);
    Route::post('login',[App\Http\Controllers\Admin\AdminController::class, 'loginUser']);
    Route::post('confirm-password',[App\Http\Controllers\Admin\AdminController::class, 'confirmPassword']);
    Route::match( ['get','post'],'/',[App\Http\Controllers\Admin\AdminController::class, 'login']);
    
    Route::group(['middleware'=>['admin']] ,function(){
        Route::get('dashboard',[App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
        Route::get('settings',[App\Http\Controllers\Admin\AdminController::class, 'settings']);
        Route::get('logout',[App\Http\Controllers\Admin\AdminController::class, 'logout']);
        Route::post('check-current-pwd',[App\Http\Controllers\Admin\AdminController::class, 'chkCurrentPassword']);
        Route::post('update-current-pwd',[App\Http\Controllers\Admin\AdminController::class, 'updateCurrentPassword']);
        Route::match(['get','post'],'update-admin-details',[App\Http\Controllers\Admin\AdminController::class, 'updateAdminDetails']);

        
    });
});
