<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function viewfaq(): View
    {
        return view ('admin.faq');
    }
    public function addfaq(): View
    {
        return view ('admin.addfaq');
    }
    public function editfaq(): View
    {
        return view ('admin.editfaq');
    }
}
