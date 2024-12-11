<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function viewproducts(): View
    {
        return view ('admin.products');
    }
    
    public function addproductpage(): View
    {
        return view ('admin.addproduct');
    }

    public function editproductpage(): View
    {
        return view ('admin.editproduct');
    }

    public function vieworders(): View
    {
        return view ('admin.orders');
    }

}
