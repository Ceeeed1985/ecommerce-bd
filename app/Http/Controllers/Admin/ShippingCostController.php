<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\ShippingCost;
use App\Models\ShippingCostRest;

class ShippingCostController extends Controller
{
    
    public function index(): View
    {
        $countries = Country::get();
        $shippingCosts = ShippingCost::get();
        $shippingCostRest = ShippingCostRest::first();
        return view ('admin.shippingcost')->with('countries', $countries)->with('shippingCosts', $shippingCosts)->with('shippingCostRest', $shippingCostRest);
    }

    public function getEditShippingCostPage($id): View
    {
        $shippingCost = ShippingCost::find($id);
        $countries = ShippingCost::get();
        return view ('admin.editshippingcostpage')->with('shippingCost', $shippingCost)->with('countries', $countries);
    }

    public function create(Request $request){
        $this->validate($request, [
            'country_id'    => 'required',
            'amount'        => 'required|numeric|min:0'
        ]);

        $shippingCost = new ShippingCost();
        $shippingCost->country_id = $request->input('country_id');
        $shippingCost->amount = $request->input('amount');

        $shippingCost->save();

        return back()->with("status", "Les frais de livraisons de {$shippingCost->amount} euros ont été ajoutés au pays {$shippingCost->country_id} avec succès");

    }

    public function createShippingCostRest(Request $request){
        $this->validate($request, [
            'amount'        => 'required|numeric|min:0'
        ]);

        $shippingCostRest = new ShippingCostRest();
        $shippingCostRest->amount = $request->input('amount');

        $shippingCostRest->save();

        return back()->with("status", "Les frais de livraison de {$shippingCostRest->amount} euros ont été ajoutés pour le reste du monde avec succès");

    }

    public function edit(Request $request, $id){
        $this->validate($request, [
            'amount' => 'required|numeric|min:0'
        ]);

        $shippingCost = ShippingCost::find($id);
        $shippingCost->amount = $request->input('amount');
        $shippingCost->update();

        return back()->with("status", "Les frais de livraisons ont été mis à jour avec succès !");

    }

    public function editShippingCostRest(Request $request, $id){
        $this->validate($request, [
            'amount' => 'required|numeric|min:0'
        ]);

        $shippingCostRest = ShippingCostRest::find($id);
        $shippingCostRest->amount = $request->input('amount');
        $shippingCostRest->update();

        return back()->with("status", "Les frais de livraison pour le reste du monde ont été mis à jour avec succès !");
    }

    public function delete($id){
        $shippingCost = ShippingCost::find($id);
        $shippingCost->delete();

        return back()->with("status", "Les frais de livraisons ont été supprimés avec succès !");
    }

}
