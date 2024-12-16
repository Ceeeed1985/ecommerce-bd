<?php

namespace App\Http\Controllers\Admin;

use App\Models\Favicon;
use App\Models\Message;
use App\Models\LogoImage;
use App\Models\Information;
use App\Models\MetaSection;
use App\Models\OnOffSection;
use Illuminate\Http\Request;
use App\Models\ProductSetting;
use App\Models\FeaturedProduct;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\LatestProductSection;
use App\Models\NewsletterSection;
use App\Models\PaymentSetting;
use App\Models\PopularProductSection;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view ('admin.dashboard');
    }

    public function settings(): View
    {
        $logoimage = LogoImage::first();
        $favicon = Favicon::first();
        $information = Information::first();
        $message = Message::first();
        $productSetting = ProductSetting::first();
        $onOffSection = OnOffSection::first();
        $metaSection = MetaSection::first();
        $featuredProduct = FeaturedProduct::first();
        $latestProductSection = LatestProductSection::first();
        $popularProductSection = PopularProductSection::first();
        $newsletterSection = NewsletterSection::first();
        $banner = Banner::first();
        $paymentSetting = PaymentSetting::first();

        return view ('admin.settings')
            ->with("logoimage", $logoimage)
            ->with("favicon", $favicon)
            ->with("information", $information)
            ->with("message", $message)
            ->with("productSetting", $productSetting)
            ->with("onOffSection", $onOffSection)
            ->with("metaSection", $metaSection)
            ->with("featuredProduct", $featuredProduct)
            ->with("latestProductSection", $latestProductSection)
            ->with("popularProductSection", $popularProductSection)
            ->with("newsletterSection", $newsletterSection)
            ->with("banner", $banner)
            ->with("paymentSetting", $paymentSetting);
    }

    public function registeredCustomers(): View
    {
        return view ('admin.registeredcustomer');
    }

    public function pageSettings(): View
    {
        return view ('admin.pagesettings');
    }

    public function socialMedia(): View
    {
        return view ('admin.socialmedia');
    }

    public function subscribers(): View
    {
        return view ('admin.subscribers');
    }

    public function profile(): View
    {
        return view ('admin.adminprofile');
    }
    
    public function orders(): View
    {
        return view ('admin.orders');
    }

}
