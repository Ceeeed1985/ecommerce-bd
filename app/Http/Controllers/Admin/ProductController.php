<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(): View
    {
        return view ('admin.products');
    }
    
    public function create(): View
    {
        return view ('admin.addproduct');
    }

    public function edit(): View
    {
        return view ('admin.editproduct');
    }

}
