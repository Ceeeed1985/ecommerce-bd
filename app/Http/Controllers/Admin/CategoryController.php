<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\MidLevelCategory;
use App\Models\TopLevelCategory;

class CategoryController extends Controller
{
    // ***********************************************************************
    // --------------------- TOP LEVEL CATEGORY ------------------------------
    // ***********************************************************************
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

    public function editTopLevel($id): View
    {
        $toplevel = TopLevelCategory::find($id);
        return view ('admin.categories.toplevel.edit')->with('toplevel', $toplevel);
    }

    public function updateTopLevel(Request $request, $id){
        $this->validate($request, [
            'tcat_name'     => 'required',
            'show_on_menu'  => 'required'
        ]);

        $toplevel = TopLevelCategory::find($id);
        $toplevel->tcat_name = $request->input('tcat_name');
        $toplevel->show_on_menu = $request->input('show_on_menu');
        $toplevel->update();

        return back()->with('status', 'Les informations sur la catégorie Top Level ont été mises à jour avec succès !');
    }

    public function deleteTopLevel($id){
        $toplevel = TopLevelCategory::find($id);
        $toplevel->delete();

        return back()->with('status', 'Votre catégorie a été supprimée avec succès !');
    }

    // ***********************************************************************
    // --------------------- MID LEVEL CATEGORY ------------------------------
    // ***********************************************************************

    public function indexMidLevel(): View
    {
        $midlevels = MidLevelCategory::all();
        $i=1;
        return view ('admin.categories.midlevel.index')->with('midlevels', $midlevels)->with('i', $i);
    }

    public function createMidLevel(): View
    {
        $toplevelcategories = TopLevelCategory::all();
        return view ('admin.categories.midlevel.create')->with('toplevelcategories', $toplevelcategories);
    }

    public function storeMidLevel(Request $request){
        $this->validate($request, [
            'tcat_id'   => 'required',
            'mcat_name' => 'required'
        ]);

        $midlevel = new MidLevelCategory();
        $midlevel->tcat_id = $request->input('tcat_id');
        $midlevel->mcat_name = $request->input('mcat_name');
        $midlevel->save();

        return back()->with('status', 'La catégorie a été ajoutée avec succès !');
    }

    public function editMidLevel($id): View {
        $midlevel = MidLevelCategory::find($id);
        return view ('admin.categories.midlevel.edit')->with('midlevel', $midlevel);
    }

    public function updateMidLevel(Request $request, $id){
        $this->validate($request, [
            'tcat_id'   => 'required',
            'mcat_name' => 'required'
        ]);

        $midlevel = MidLevelCategory::find($id);
        $midlevel->tcat_id = $request->input('tcat_id');
        $midlevel->mcat_name = $request->input('mcat_name');
        $midlevel->update();

        return back()->with('status', 'La catégorie a été mise à jour avec succès !');
    }


    public function deleteMidLevel($id){
        $midlevel = MidLevelCategory::find($id);
        $midlevel->delete();

        return back()->with('status', 'La catégorie a été effacée avec succès !');
    }

    // ***********************************************************************
    // --------------------- END LEVEL CATEGORY ------------------------------
    // ***********************************************************************

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
