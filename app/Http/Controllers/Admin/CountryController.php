<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{
    
    public function index(): View
    {
        $countries = Country::get();
        $i = 1;
        return view ('admin.country')->with('countries', $countries)->with('i', $i);
    }

    public function getAddCountryPage(): View
    {
        return view ('admin.addcountrypage');
    }

    public function getEditCountryPage($id): View
    {
        $country = Country::find($id);
        return view ('admin.editcountrypage')->with('country', $country);
    }

    public function create(Request $request){
        $this->validate($request, [
            'country_name' => "required"
        ]);

        $country = new Country();
        $country->country_name = $request->input('country_name');
        $country->save();

        return back()->with("status", "Le pays " . ($country->country_name) . " a été ajouté avec succès");
    }

    public function edit(Request $request, $id){
        $this->validate($request, [
            'country_name' => 'required'
        ]);

        $country = Country::find($id);
        $country->country_name = $request->input('country_name');
        $country->update();

        return back()->with("status", "Le pays a été mis à jour avec succès !");
    }

    public function delete($id){
        $country = Country::find($id);
        $country->delete();

        return back()->with("status", "Le pays a été supprimé avec succès !");
    }
}
