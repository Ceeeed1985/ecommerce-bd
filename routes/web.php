<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ShippingCostController;
use App\Http\Controllers\Admin\SizeController;

// CLIENTS
Route::get('/', [ClientController::class, 'viewhomepage'])->name('home');
Route::get('/about', [ClientController::class, 'viewaboutpage']);
Route::get('/faq', [ClientController::class, 'viewfaqpage']);
Route::get('/contact', [ClientController::class, 'viewcontactpage']);
Route::get('/login', [ClientController::class, 'viewloginpage']);
Route::get('/register', [ClientController::class, 'viewregisterpage']);
Route::get('/cart', [ClientController::class, 'viewcartpage']);
Route::get('/checkout', [ClientController::class, 'viewcheckoutpage']);
Route::get('/dashboard', [ClientController::class, 'viewdashboardpage']);
Route::get('/profile', [ClientController::class, 'viewprofilepage']);
Route::get('/billingdetails', [ClientController::class, 'viewbillingdetailspage']);
Route::get('/loginpassword', [ClientController::class, 'viewloginpasswordpage']);
Route::get('/customerorders', [ClientController::class, 'viewcustomerorderspage']);
Route::get('/productbycategory', [ClientController::class, 'viewproductbycategorypage']);
Route::get('/productdetails', [ClientController::class, 'viewproductdetailspage']);
Route::get('/searchproduct', [ClientController::class, 'viewsearchproductpage']);



// ADMIN

Route::prefix('admin')->name('admin.')->group(function () {
    // Routes générales
    Route::get('/', [AdminController::class, 'viewadmindashboard']);
    Route::get('settings', [AdminController::class, 'viewadminsettings']);
    Route::get('registeredcustomer', [AdminController::class, 'viewregisteredcustomerpage']);
    Route::get('pagesettings', [AdminController::class, 'viewpagesettings']);
    Route::get('socialmedia', [AdminController::class, 'viewsocialmediapage']);
    Route::get('subscribers', [AdminController::class, 'viewsubscriberspage']);
    Route::get('adminprofile', [AdminController::class, 'adminprofilepage']);
    Route::get('orders', [AdminController::class, 'vieworders']);

    // Shop Settings - Size
    Route::get('size', [SizeController::class, 'index']);
    Route::get('addsize', [SizeController::class, 'create']);
    Route::get('editsize', [SizeController::class, 'edit']);

    // Shop Settings - Color
    Route::get('color', [ColorController::class, 'index']);
    Route::get('addcolor', [ColorController::class, 'create']);
    Route::get('editcolor', [ColorController::class, 'edit']);

    // Shop Settings - Country
    Route::get('country', [CountryController::class, 'index']);
    Route::get('addcountry', [CountryController::class, 'create']);
    Route::get('editcountry', [CountryController::class, 'edit']);

    // Shop Settings - Shipping Cost
    Route::get('shippingcost', [ShippingCostController::class, 'index']);
    Route::get('editshippingcost', [ShippingCostController::class, 'edit']);

    // ADMIN - Categories
    Route::get('toplevelcategory', [CategoryController::class, 'viewtoplevelcategorypage']);
    Route::get('addtoplevelcategory', [CategoryController::class, 'viewaddtoplevelcategorypage']);
    Route::get('edittoplevelcategory', [CategoryController::class, 'viewedittoplevelcategorypage']);
    Route::get('midlevelcategory', [CategoryController::class, 'viewmidlevelcategorypage']);
    Route::get('addmidlevelcategory', [CategoryController::class, 'viewaddmidlevelcategorypage']);
    Route::get('editmidlevelcategory', [CategoryController::class, 'vieweditmidlevelcategorypage']);
    Route::get('endlevelcategory', [CategoryController::class, 'viewendlevelcategorypage']);
    Route::get('addendlevelcategory', [CategoryController::class, 'viewaddendlevelcategorypage']);
    Route::get('editendlevelcategory', [CategoryController::class, 'vieweditendlevelcategorypage']);
    
    // Products
    Route::get('products', [ProductController::class, 'index']);
    Route::get('addproduct', [ProductController::class, 'create']);
    Route::get('editproduct', [ProductController::class, 'edit']);

    // ADMIN - Slider
    Route::get('sliders', [SliderController::class, 'index']);
    Route::get('addslider', [SliderController::class, 'create']);
    Route::get('editslider', [SliderController::class, 'edit']);

    // ADMIN - Services
    Route::get('services', [ServiceController::class, 'index']);
    Route::get('addservice', [ServiceController::class, 'create']);
    Route::get('editservice', [ServiceController::class, 'edit']);

    // ADMIN - Faq
    Route::get('faq', [FaqController::class, 'index']);
    Route::get('addfaq', [FaqController::class, 'create']);
    Route::get('editfaq', [FaqController::class, 'edit']);
});




