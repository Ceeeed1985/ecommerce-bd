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
use App\Http\Controllers\Admin\SettingController;
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
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('settings', [AdminController::class, 'settings']);
    Route::get('registeredcustomer', [AdminController::class, 'registeredCustomers']);
    Route::get('pagesettings', [AdminController::class, 'pageSettings']);
    Route::get('socialmedia', [AdminController::class, 'socialMedia']);
    Route::get('subscribers', [AdminController::class, 'subscribers']);
    Route::get('adminprofile', [AdminController::class, 'profile']);
    Route::get('orders', [AdminController::class, 'orders']);

    // Shop Settings - Size
    Route::get('size', [SizeController::class, 'index'])->name('size');
    Route::get('addsizepage', [SizeController::class, 'getAddSizePage'])->name('addSizePage');
    Route::get('editsizepage/{id}', [SizeController::class, 'getEditSizePage'])->name('editSizePage');
    Route::post('createsize', [SizeController::class, 'create'])->name('createSize');
    Route::put('editsize/{id}', [SizeController::class, 'edit'])->name('editSize');
    Route::delete('deletesize/{id}', [SizeController::class, 'delete'])->name('deleteSize');

    // Shop Settings - Color
    Route::get('color', [ColorController::class, 'index'])->name('color');
    Route::get('addcolorpage', [ColorController::class, 'getAddColorPage'])->name('addColorPage');
    Route::get('editcolorpage/{id}', [ColorController::class, 'getEditColorPage'])->name('editColorPage');
    Route::post('createcolor', [ColorController::class, 'create'])->name('createColor');
    Route::put('editcolor/{id}', [ColorController::class, 'edit'])->name('editColor');
    Route::delete('deletecolor/{id}', [ColorController::class, 'delete'])->name('deleteColor');

    // Shop Settings - Country
    Route::get('country', [CountryController::class, 'index'])->name('country');
    Route::get('addcountrypage', [CountryController::class, 'getAddCountryPage'])->name('addCountryPage');
    Route::get('editcountrypage/{id}', [CountryController::class, 'getEditCountryPage'])->name('editCountryPage');
    Route::post('createcountry', [CountryController::class, 'create'])->name('createCountry');
    Route::put('editcountry/{id}', [CountryController::class, 'edit'])->name('editCountry');
    Route::delete('deletecountry/{id}', [CountryController::class, 'delete'])->name('deleteCountry');

    // Shop Settings - Shipping Cost
    Route::get('shippingcost', [ShippingCostController::class, 'index'])->name('shippingCost');
    Route::get('editshippingcostpage/{id}', [ShippingCostController::class, 'getEditShippingCostPage'])->name('editShippingCostPage');
    Route::post('createshippingcost', [ShippingCostController::class, 'create'])->name('createShippingCost');
    Route::put('editshippingcost/{id}', [ShippingCostController::class, 'edit'])->name('editShippingCost');
    Route::delete('deleteshippingcost/{id}', [ShippingCostController::class, 'delete'])->name('deleteShippingCost');
    Route::post('createshippingcostrest', [ShippingCostController::class, 'createShippingCostRest'])->name('createShippingCostRest');
    Route::put('editshippingcostrest/{id}', [ShippingCostController::class, 'editShippingCostRest'])->name('editShippingCostRest');

    // ADMIN - Categories
    Route::prefix('category')->name('category.')->group(function () {
        // Category Top Level
        Route::prefix('toplevel')->name('toplevel.')->group(function () {
            Route::get('/', [CategoryController::class, 'indexTopLevel'])->name('index');
            Route::get('create', [CategoryController::class, 'createTopLevel'])->name('create');
            Route::get('edit/{id}', [CategoryController::class, 'editTopLevel'])->name('edit');
            Route::post('store', [CategoryController::class, 'storeTopLevel'])->name('store');
            Route::put('update/{id}', [CategoryController::class, 'updateTopLevel'])->name('update');
            Route::delete('delete/{id}', [CategoryController::class, 'deleteTopLevel'])->name('delete');
        });

        // Category Mid Level
        Route::prefix('midlevel')->name('midlevel.')->group(function(){
            Route::get('/', [CategoryController::class, 'indexMidLevel'])->name('index');
            Route::get('create', [CategoryController::class, 'createMidLevel'])->name('create');
            Route::get('edit', [CategoryController::class, 'editMidLevel'])->name('edit');
        });

        // Category End Level
        Route::prefix('endlevel')->name('endlevel.')->group(function() {
            Route::get('/', [CategoryController::class, 'indexEndLevel'])->name('index');
            Route::get('create', [CategoryController::class, 'createEndLevel'])->name('create');
            Route::get('edit', [CategoryController::class, 'editEndLevel'])->name('edit');
        });
    });

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

    // SettingController
    Route::post('savelogo', [SettingController::class, "saveLogo"]);
    Route::put('updatelogo/{id}', [SettingController::class, "updateLogo"]);

    Route::post('savefavicon', [SettingController::class, "saveFavicon"]);
    Route::put('updatefavicon/{id}', [SettingController::class, "updateFavicon"]);

    Route::post('saveinformation', [SettingController::class, "saveInformation"]);
    Route::put('updateinformation/{id}', [SettingController::class, "updateInformation"]);

    Route::post('savemessage', [SettingController::class, "saveMessage"]);
    Route::put('updatemessage/{id}', [SettingController::class, "updateMessage"]);

    Route::post('saveproductsetting', [SettingController::class, "saveProductSetting"]);
    Route::put('updateproductsetting/{id}', [SettingController::class, "updateProductSetting"]);

    Route::post('saveonoffsection', [SettingController::class, "saveOnOffSection"]);
    Route::put('updateonoffsection/{id}', [SettingController::class, "updateOnOffSection"]);

    Route::post('saveMetaSection', [SettingController::class, "saveMetaSection"]);
    Route::put('updateMetaSection/{id}', [SettingController::class, "updateMetaSection"]);

    Route::post('saveFeaturedProduct', [SettingController::class, "saveFeaturedProduct"]);
    Route::put('updateFeaturedProduct/{id}', [SettingController::class, "updateFeaturedProduct"]);

    Route::post('saveLatestProductSection', [SettingController::class, "saveLatestProductSection"]);
    Route::put('updateLatestProductSection/{id}', [SettingController::class, "updateLatestProductSection"]);

    Route::post('savePopularProductSection', [SettingController::class, "savePopularProductSection"]);
    Route::put('updatePopularProductSection/{id}', [SettingController::class, "updatePopularProductSection"]);

    Route::post('saveNewsletterSection', [SettingController::class, "saveNewsletterSection"]);
    Route::put('updateNewsletterSection/{id}', [SettingController::class, "updateNewsletterSection"]);

    Route::post('saveBanner', [SettingController::class, 'saveBanner']);
    Route::put('updateBanner/{id}', [SettingController::class, 'updateBanner']);

    Route::post('savePaymentSetting', [SettingController::class, 'savePaymentSetting']);
    Route::put('updatePaymentSetting/{id}', [SettingController::class, 'updatePaymentSetting']);

});




