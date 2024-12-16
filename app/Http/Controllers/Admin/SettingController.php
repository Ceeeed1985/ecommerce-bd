<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favicon;
use App\Models\Information;
use App\Models\LogoImage;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function saveLogo(Request $request){
        $this->validate($request, [
            'photo_logo' => 'image|nullable|max:1999|required'
        ]);

        $fileNameWithExt = $request->file('photo_logo')->getClientOriginalName();
        
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        $ext = $request->file('photo_logo')->getClientOriginalExtension();

        $fileNameToStore = $fileName.'_'.time().'.'.$ext;

        $path = $request->file('photo_logo')->storeAs('public/logoimage', $fileNameToStore);

        $logoimage = new LogoImage();
        $logoimage->photo_logo = $fileNameToStore;
        $logoimage->save();

        return back()->with("status", 'Le logo a bien été enregistré !!!');

    }

    public function updateLogo(Request $request, $id){
        $this->validate($request, [
            'photo_logo' => 'image|nullable|max:1999|required'
        ]);

        $fileNameWithExt = $request->file('photo_logo')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('photo_logo')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;

        $logoimage = LogoImage::find($id);
        Storage::delete("public/logoimage/$logoimage->photo_logo");

        $path = $request->file('photo_logo')->storeAs('public/logoimage', $fileNameToStore);

        $logoimage->photo_logo = $fileNameToStore;
        $logoimage->update();

        return back()->with("status", 'Le logo a bien été modifié !!!');

    }

    public function saveFavicon(Request $request){
        $this->validate($request, [
            'photo_favicon' => 'image|nullable|max:1999|required'
        ]);

        $fileNameWithExt = $request->file('photo_favicon')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('photo_favicon')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;

        $path = $request->file('photo_favicon')->storeAs('public/logoimage', $fileNameToStore);

        $favicon = new Favicon();
        $favicon->photo_favicon = $fileNameToStore;
        $favicon->save();

        return back()->with("status", "Votre Favicon a bien été ajouté !!!");
    }

    public function updateFavicon(Request $request, $id){
        $this->validate($request, [
            'photo_favicon' => 'image|nullable|max:1999|required'
        ]);

        $fileNameWithExt = $request->file('photo_favicon')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('photo_favicon')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;

        $favicon = Favicon::find($id);
        Storage::delete("public/logoimage/$favicon->photo_favicon");

        $path = $request->file('photo_favicon')->storeAs('public/logoimage', $fileNameToStore);

        $favicon->photo_favicon = $fileNameToStore;
        $favicon->update();

        return back()->with("status", 'Le Favicon a bien été mis à jour !!!');

    }

    public function saveInformation(Request $request){
        $this->validate($request, [
            'newsletter_on_off' => 'required',
            'footer_copyright' => 'required',
            'contact_address' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'contact_map_iframe' => 'required'
        ]);

        $information = new Information();
        $information->newsletter_on_off = $request->input('newsletter_on_off');
        $information->footer_copyright = $request->input('footer_copyright');
        $information->contact_address = $request->input('contact_address');
        $information->contact_email = $request->input('contact_email');
        $information->contact_phone = $request->input('contact_phone');
        $information->contact_map_iframe = $request->input('contact_map_iframe');

        $information->save();

        return back()->with("status", "Les informations ont été encodées avec succès !!");

    }

    public function updateInformation(Request $request, $id){
        $this->validate($request, [
            'newsletter_on_off' => 'required',
            'footer_copyright' => 'required',
            'contact_address' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'contact_map_iframe' => 'required'
        ]);

        $information = Information::find($id);
        $information->newsletter_on_off = $request->input('newsletter_on_off');
        $information->footer_copyright = $request->input('footer_copyright');
        $information->contact_address = $request->input('contact_address');
        $information->contact_email = $request->input('contact_email');
        $information->contact_phone = $request->input('contact_phone');
        $information->contact_map_iframe = $request->input('contact_map_iframe');

        $information->update();

        return back()->with("status", "Les informations ont été mises à jour avec succès !!");

    }


}
