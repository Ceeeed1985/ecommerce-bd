<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index(): View
    {
        return view ('admin.color');
    }

    public function create(): View
    {
        return view ('admin.addcolor');
    }

    public function edit(): View
    {
        return view ('admin.editcolor');
    }
}
