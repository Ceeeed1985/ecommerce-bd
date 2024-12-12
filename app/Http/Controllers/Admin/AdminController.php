<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function viewadmindashboard(): View
    {
        return view ('admin.dashboard');
    }

    public function viewadminsettings(): View
    {
        return view ('admin.settings');
    }

    public function viewregisteredcustomerpage(): View
    {
        return view ('admin.registeredcustomer');
    }

    public function viewpagesettings(): View
    {
        return view ('admin.pagesettings');
    }

    public function viewsocialmediapage(): View
    {
        return view ('admin.socialmedia');
    }

    public function viewsubscriberspage(): View
    {
        return view ('admin.subscribers');
    }

    public function adminprofilepage(): View
    {
        return view ('admin.adminprofile');
    }
    
    public function vieworders(): View
    {
        return view ('admin.orders');
    }

}
