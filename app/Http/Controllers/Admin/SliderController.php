<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index(): View
    {
        return view('admin.sliders');
    }

    public function create(): View
    {
        return view('admin.addslider');
    }
    
    public function edit(): View
    {
        return view('admin.editslider');
    }

}
