<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Client
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

// Admin
Route::get('admin', [AdminController::class, 'viewadmindashboard']);
Route::get('admin/settings', [AdminController::class, 'viewadminsettings']);
Route::get('admin/size', [AdminController::class, 'viewsizepage']);
Route::get('admin/addsize', [AdminController::class, 'viewaddsizepage']);
Route::get('admin/editsize', [AdminController::class, 'vieweditsizepage']);
Route::get('admin/color', [AdminController::class, 'viewcolorpage']);
Route::get('admin/addcolor', [AdminController::class, 'viewaddcolorpage']);
Route::get('admin/editcolor', [AdminController::class, 'vieweditcolorpage']);
Route::get('admin/country', [AdminController::class, 'viewcountrypage']);
Route::get('admin/addcountry', [AdminController::class, 'viewaddcountrypage']);
Route::get('admin/editcountry', [AdminController::class, 'vieweditcountrypage']);
Route::get('admin/shippingcost', [AdminController::class, 'viewshippingcostpage']);
Route::get('admin/editshippingcost', [AdminController::class, 'vieweditshippingcostpage']);
Route::get('admin/registeredcustomer', [AdminController::class, 'viewregisteredcustomerpage']);
Route::get('admin/pagesettings', [AdminController::class, 'viewpagesettings']);
Route::get('admin/socialmedia', [AdminController::class, 'viewsocialmediapage']);
Route::get('admin/subscribers', [AdminController::class, 'viewsubscriberspage']);
Route::get('admin/adminprofile', [AdminController::class, 'adminprofilepage']);

// Services
Route::get('admin/services', [ServiceController::class, 'getservicespage']);
Route::get('admin/addservice', [ServiceController::class, 'addservicespage']);
Route::get('admin/editservice', [ServiceController::class, 'editservicespage']);

// Categories
Route::get('admin/toplevelcategory', [CategoryController::class, 'viewtoplevelcategorypage']);
Route::get('admin/addtoplevelcategory', [CategoryController::class, 'viewaddtoplevelcategorypage']);
Route::get('admin/edittoplevelcategory', [CategoryController::class, 'viewedittoplevelcategorypage']);
Route::get('admin/midlevelcategory', [CategoryController::class, 'viewmidlevelcategorypage']);
Route::get('admin/addmidlevelcategory', [CategoryController::class, 'viewaddmidlevelcategorypage']);
Route::get('admin/editmidlevelcategory', [CategoryController::class, 'vieweditmidlevelcategorypage']);
Route::get('admin/endlevelcategory', [CategoryController::class, 'viewendlevelcategorypage']);
Route::get('admin/addendlevelcategory', [CategoryController::class, 'viewaddendlevelcategorypage']);
Route::get('admin/editendlevelcategory', [CategoryController::class, 'vieweditendlevelcategorypage']);

// Products
Route::get('admin/products', [ProductController::class, 'viewproducts']);
Route::get('admin/addproduct', [ProductController::class, 'addproductpage']);
Route::get('admin/editproduct', [ProductController::class, 'editproductpage']);
Route::get('admin/orders', [ProductController::class, 'vieworders']);

// Slider
Route::get('admin/sliders', [SliderController::class, 'viewsliders']);
Route::get('admin/editslider', [SliderController::class, 'editslider']);
Route::get('admin/addslider', [SliderController::class, 'addslider']);

// Faq admin
Route::get('admin/faq', [FaqController::class, 'viewfaq']);
Route::get('admin/editfaq', [FaqController::class, 'editfaq']);
Route::get('admin/addfaq', [FaqController::class, 'addfaq']);

