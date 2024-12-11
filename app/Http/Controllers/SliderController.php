<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller
{
    public function viewsliders(): View
    {
        return view('admin.sliders');
    }

    public function editslider(): View
    {
        return view('admin.editslider');
    }

    public function addslider(): View
    {
        return view('admin.addslider');
    }
}
