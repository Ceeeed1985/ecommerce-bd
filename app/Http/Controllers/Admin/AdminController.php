<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view ('admin.dashboard');
    }

    public function settings(): View
    {
        return view ('admin.settings');
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
