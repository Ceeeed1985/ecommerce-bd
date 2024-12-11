<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

    public function viewsizepage(): View
    {
        return view ('admin.size');
    }

    public function viewaddsizepage(): View
    {
        return view ('admin.addsize');
    }

    public function vieweditsizepage(): View
    {
        return view ('admin.editsize');
    }

    public function viewcolorpage(): View
    {
        return view ('admin.color');
    }

    public function viewaddcolorpage(): View
    {
        return view ('admin.addcolor');
    }

    public function vieweditcolorpage(): View
    {
        return view ('admin.editcolor');
    }

    public function viewcountrypage(): View
    {
        return view ('admin.country');
    }

    public function viewaddcountrypage(): View
    {
        return view ('admin.addcountry');
    }

    public function vieweditcountrypage(): View
    {
        return view ('admin.editcountry');
    }

    public function viewshippingcostpage(): View
    {
        return view ('admin.shippingcost');
    }

    public function vieweditshippingcostpage(): View
    {
        return view ('admin.editshippingcost');
    }

    public function viewregisteredcustomerpage(): View
    {
        return view ('admin.registeredcustomer');
    }


}
