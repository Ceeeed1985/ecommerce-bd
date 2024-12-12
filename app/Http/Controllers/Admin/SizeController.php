<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    
    public function index(): View
    {
        return view ('admin.size');
    }

    public function create(): View
    {
        return view ('admin.addsize');
    }

    public function edit(): View
    {
        return view ('admin.editsize');
    }

}
