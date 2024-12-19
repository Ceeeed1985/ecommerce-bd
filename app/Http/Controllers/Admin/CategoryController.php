<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\TopLevelCategory;

class CategoryController extends Controller
{
    
    public function indexTopLevel(): View
    {
        $toplevels = TopLevelCategory::get();
        $i = 1;
        return view ('admin.categories.toplevel.index')->with('toplevels', $toplevels)->with('i', $i);
    }

    public function createTopLevel(): View
    {
        return view ('admin.categories.toplevel.create');
    }

    public function storeTopLevel(Request $request){
        $this->validate($request, [
            'tcat_name'     => 'required',
            'show_on_menu'  => 'required'
        ]);

        $toplevel = new TopLevelCategory();
        $toplevel->tcat_name = $request->input('tcat_name');
        $toplevel->show_on_menu = $request->input('show_on_menu');
        $toplevel->save();

        return back()->with('status', 'Les informations sur la Top Catégory ont été encodées avec succès !');
    }

    public function editTopLevel(): View
    {
        return view ('admin.categories.toplevel.edit');
    }

    public function indexMidLevel(): View
    {
        return view ('admin.categories.midlevel.index');
    }

    public function createMidLevel(): View
    {
        return view ('admin.categories.midlevel.create');
    }

    public function editMidLevel(): View
    {
        return view ('admin.categories.midlevel.edit');
    }

    public function indexEndLevel(): View
    {
        return view ('admin.categories.endlevel.index');
    }

    public function createEndLevel(): View
    {
        return view ('admin.categories.endlevel.create');
    }

    public function editEndLevel(): View
    {
        return view ('admin.categories.endlevel.edit');
    }
}
