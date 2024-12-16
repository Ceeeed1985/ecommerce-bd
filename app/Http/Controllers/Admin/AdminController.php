<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Favicon;
use App\Models\Information;
use App\Models\LogoImage;
use App\Models\Message;
use App\Models\OnOffSection;
use App\Models\ProductSetting;

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

        return view ('admin.settings')
            ->with("logoimage", $logoimage)
            ->with("favicon", $favicon)
            ->with("information", $information)
            ->with("message", $message)
            ->with("productSetting", $productSetting)
            ->with("onOffSection", $onOffSection);
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
