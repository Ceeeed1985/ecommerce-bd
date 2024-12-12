<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingCostController extends Controller
{
    
    public function index(): View
    {
        return view ('admin.shippingcost');
    }

    public function edit(): View
    {
        return view ('admin.editshippingcost');
    }

}
