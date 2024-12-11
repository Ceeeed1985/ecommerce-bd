<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function getservicespage(): View
    {
        return view ('admin.services');
    }

    public function addservicespage(): View
    {
        return view ('admin.addservice');
    }

    public function editservicespage(): View
    {
        return view ('admin.editservice');
    }
}
