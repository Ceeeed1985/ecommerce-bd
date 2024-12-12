<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index(): View
    {
        return view ('admin.faq');
    }
    public function create(): View
    {
        return view ('admin.addfaq');
    }
    public function edit(): View
    {
        return view ('admin.editfaq');
    }
}
