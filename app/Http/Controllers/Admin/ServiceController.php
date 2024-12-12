<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view ('admin.services');
    }

    public function create(): View
    {
        return view ('admin.addservice');
    }

    public function edit(): View
    {
        return view ('admin.editservice');
    }
}
