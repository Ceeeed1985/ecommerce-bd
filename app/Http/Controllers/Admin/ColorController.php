<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;

class ColorController extends Controller
{
    // PAGE AVEC TOUTES LES COULEURS
    public function index(): View
    {
        $colors = Color::get();
        $i = 1;
        return view ('admin.color')->with('colors', $colors)->with('i', $i);
    }

    // PAGE POUR AJOUTER UNE COULEUR
    public function getAddColorPage(): View
    {
        return view ('admin.addcolorpage');
    }

    // PAGE POUR MODIFIER UNE COULEUR
    public function getEditColorPage($id): View
    {
        $color = Color::find($id);
        return view ('admin.editcolorpage')->with('color', $color);
    }

    // AJOUTER UNE COULEUR
    public function create(Request $request){
        $this->validate($request, [
            'color_name' => 'required'
        ]);

        $color = new Color();
        $color->color_name = $request->input('color_name');
        $color->save();

        return back()->with("status", "Une nouvelle couleur a été ajoutée avec succès !");
    }

    public function edit(Request $request, $id){
        $this->validate($request, [
            'color_name' => 'required'
        ]);

        $color = Color::find($id);
        $color->color_name = $request->input('color_name');
        $color->update();

        return back()->with("status", "La couleur a été modifiée avec succès !");
    }

    public function delete($id){
        $color = Color::find($id);
        $color->delete();

        return back()->with("status", "La couleur a été supprimée avec succès !");
    }

}
