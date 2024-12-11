<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    
    public function viewtoplevelcategorypage(): View
    {
        return view ('admin.toplevelcategory');
    }

    public function viewaddtoplevelcategorypage(): View
    {
        return view ('admin.addtoplevelcategory');
    }

    public function viewedittoplevelcategorypage(): View
    {
        return view ('admin.edittoplevelcategory');
    }

    public function viewmidlevelcategorypage(): View
    {
        return view ('admin.midlevelcategory');
    }

    public function viewaddmidlevelcategorypage(): View
    {
        return view ('admin.addmidlevelcategory');
    }

    public function vieweditmidlevelcategorypage(): View
    {
        return view ('admin.editmidlevelcategory');
    }

    public function viewendlevelcategorypage(): View
    {
        return view ('admin.endlevelcategory');
    }

    public function viewaddendlevelcategorypage(): View
    {
        return view ('admin.addendlevelcategory');
    }

    public function vieweditendlevelcategorypage(): View
    {
        return view ('admin.editendlevelcategory');
    }
}
