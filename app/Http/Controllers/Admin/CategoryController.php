<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    public function indexTopLevel(): View
    {
        return view ('admin.toplevelcategory');
    }

    public function createTopLevel(): View
    {
        return view ('admin.addtoplevelcategory');
    }

    public function editTopLevel(): View
    {
        return view ('admin.edittoplevelcategory');
    }

    public function indexMidLevel(): View
    {
        return view ('admin.midlevelcategory');
    }

    public function createMidLevel(): View
    {
        return view ('admin.addmidlevelcategory');
    }

    public function editMidLevel(): View
    {
        return view ('admin.editmidlevelcategory');
    }

    public function indexEndLevel(): View
    {
        return view ('admin.endlevelcategory');
    }

    public function createEndLevel(): View
    {
        return view ('admin.addendlevelcategory');
    }

    public function editEndLevel(): View
    {
        return view ('admin.editendlevelcategory');
    }
}
