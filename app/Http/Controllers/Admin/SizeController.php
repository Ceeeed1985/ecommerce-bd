<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    // PAGE AVEC TOUTES LES TAILLES
    public function index(): View
    {
        $sizes = Size::get();
        $i = 1;
        return view ('admin.size')->with('sizes', $sizes)->with('i', $i);
    }

    // PAGE POUR AJOUTER UNE TAILLE
    public function getAddSizePage(): View
    {
        return view ('admin.addsizepage');
    }

    // PAGE POUR MODIFIER UNE TAILLE
    public function getEditSizePage($id): View
    {
        $size = Size::find($id);
        return view ('admin.editsizepage')->with('size', $size);
    }

    // AJOUTER UNE TAILLE
    public function create(Request $request){
        $this->validate($request, [
            'size_name' => 'required'
        ]);

        $size = new Size();
        $size->size_name = $request->input('size_name');
        $size->save();

        return back()->with("status", "La nouvelle taille a été encodée avec succès !");
    }

    // MODIFIER UNE TAILLE
    public function edit(Request $request, $id){
        $this->validate ($request, [
            'size_name' => 'required'
        ]);

        $size = Size::find($id);
        $size->size_name = $request->input('size_name');
        $size->update();

        return back()->with("status", "La taille a été mise à jour avec succès !");
    }

    public function delete($id){
        $size = Size::find($id);
        $size->delete();

        return back()->with("status", "La taille a été supprimée avec succès !");

    }
}
