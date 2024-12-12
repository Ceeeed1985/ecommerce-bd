<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    
    public function index(): View
    {
        return view ('admin.country');
    }

    public function create(): View
    {
        return view ('admin.addcountry');
    }

    public function edit(): View
    {
        return view ('admin.editcountry');
    }
}
