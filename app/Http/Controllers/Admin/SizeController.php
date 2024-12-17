<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    
    public function index(): View
    {
        $sizes = Size::get();
        $i = 1;
        return view ('admin.size')
            ->with('sizes', $sizes)
            ->with('i', $i);
    }

    public function getAddSizePage(): View
    {
        return view ('admin.addsizepage');
    }

    public function editSize($id): View
    {
        $size = Size::find($id);
        return view ('admin.editsize')->with('size', $size);
    }

    public function create(Request $request){
        $this->validate($request, [
            'size_name' => 'required'
        ]);

        $size = new Size();
        $size->size_name = $request->input('size_name');
        $size->save();

        return back()->with("status", "La nouvelle taille a été encodée avec succès !");
    }

    public function updateSize(Request $request, $id){
        $this->validate ($request, [
            'size_name' => 'required'
        ]);

        $size = Size::find($id);
        $size->size_name = $request->input('size_name');
        $size->update();

        return back()->with("status", "La taille a été mise à jour avec succès !");
    }

}
