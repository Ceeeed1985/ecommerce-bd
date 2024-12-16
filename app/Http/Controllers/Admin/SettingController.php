<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favicon;
use App\Models\FeaturedProduct;
use App\Models\Information;
use App\Models\LatestProductSection;
use App\Models\LogoImage;
use App\Models\Message;
use App\Models\MetaSection;
use App\Models\NewsletterSection;
use App\Models\OnOffSection;
use App\Models\PopularProductSection;
use App\Models\ProductSetting;
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
            'newsletter_on_off'     => 'required',
            'footer_copyright'      => 'required',
            'contact_address'       => 'required',
            'contact_email'         => 'required',
            'contact_phone'         => 'required',
            'contact_map_iframe'    => 'required'
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

    public function saveMessage(Request $request){
        $this->validate($request, [
            'receive_email'                     => 'required',
            'receive_email_subject'             => 'required',
            'receive_email_thank_you_message'   => 'required',
            'forget_password_message'           => 'required'
        ]);

        $message = new Message();
        $message->receive_email = $request->input('receive_email');
        $message->receive_email_subject = $request->input('receive_email_subject');
        $message->receive_email_thank_you_message = $request->input('receive_email_thank_you_message');
        $message->forget_password_message = $request->input('forget_password_message');

        $message->save();

        return back()->with("status", "Vos messages ont bien été encodés !!!");

    }

    public function updateMessage(Request $request, $id){
        $this->validate($request, [
            'receive_email'                     => 'required',
            'receive_email_subject'             => 'required',
            'receive_email_thank_you_message'   => 'required',
            'forget_password_message'           => 'required'
        ]);

        $message = Message::find($id);
        $message->receive_email = $request->input('receive_email');
        $message->receive_email_subject = $request->input('receive_email_subject');
        $message->receive_email_thank_you_message = $request->input('receive_email_thank_you_message');
        $message->forget_password_message = $request->input('forget_password_message');

        $message->update();

        return back()->with("status", "Vos messages ont été modifiés avec succès !!!");

    }

    public function saveProductSetting(Request $request){
        $this->validate($request, [
            'total_featured_product_home'       => 'required',
            'total_latest_product_home'         => 'required',
            'total_popular_product_home'       => 'required',
        ]);

        $productSetting = new ProductSetting();
        $productSetting->total_featured_product_home = $request->input('total_featured_product_home');
        $productSetting->total_latest_product_home = $request->input('total_latest_product_home');
        $productSetting->total_popular_product_home = $request->input('total_popular_product_home');

        $productSetting->save();

        return back()->with("status", "Les préférences ont bien été enregistrées !");

    }

    public function updateProductSetting(Request $request, $id){
        $this->validate($request, [
            'total_featured_product_home'       => 'required',
            'total_latest_product_home'         => 'required',
            'total_popular_product_home'       => 'required',
        ]);

        $productSetting = ProductSetting::find($id);
        $productSetting->total_featured_product_home = $request->input('total_featured_product_home');
        $productSetting->total_latest_product_home = $request->input('total_latest_product_home');
        $productSetting->total_popular_product_home = $request->input('total_popular_product_home');

        $productSetting->update();

        return back()->with("status", "Vos préférences ont été mises à jour avec succès !");

    }

    public function saveOnOffSection(Request $request){
        $this->validate($request, [
            'home_service_on_off'           => 'required',
            'home_welcome_on_off'           => 'required',
            'home_featured_product_on_off'  => 'required',
            'home_latest_product_on_off'    => 'required',
            'home_popular_product_on_off'   => 'required'
        ]);

        $onOffSection = new OnOffSection();

        $onOffSection->home_service_on_off = $request->input('home_service_on_off');
        $onOffSection->home_welcome_on_off = $request->input('home_welcome_on_off');
        $onOffSection->home_featured_product_on_off = $request->input('home_featured_product_on_off');
        $onOffSection->home_latest_product_on_off = $request->input('home_latest_product_on_off');
        $onOffSection->home_popular_product_on_off = $request->input('home_popular_product_on_off');

        $onOffSection->save();

        return back()->with("status", "Vos sections ont été ajoutées avec succès !");
    }

    public function updateOnOffSection(Request $request, $id){
        $this->validate($request, [
            'home_service_on_off'           => 'required',
            'home_welcome_on_off'           => 'required',
            'home_featured_product_on_off'  => 'required',
            'home_latest_product_on_off'    => 'required',
            'home_popular_product_on_off'   => 'required'
        ]);

        $onOffSection = OnOffSection::find($id);

        $onOffSection->home_service_on_off = $request->input('home_service_on_off');
        $onOffSection->home_welcome_on_off = $request->input('home_welcome_on_off');
        $onOffSection->home_featured_product_on_off = $request->input('home_featured_product_on_off');
        $onOffSection->home_latest_product_on_off = $request->input('home_latest_product_on_off');
        $onOffSection->home_popular_product_on_off = $request->input('home_popular_product_on_off');

        $onOffSection->update();

        return back()->with("status", "Vos sections ont été mises à jour avec succès !");
    }

    public function saveMetaSection(Request $request){
        $this->validate($request, [
            'meta_title_home'       => 'required',
            'meta_keyword_home'     => 'required',
            'meta_description_home' => 'required'
        ]);

        $metaSection = new MetaSection();
        $metaSection->meta_title_home = $request->input('meta_title_home');
        $metaSection->meta_keyword_home = $request->input('meta_keyword_home');
        $metaSection->meta_description_home = $request->input('meta_description_home');

        $metaSection->save();

        return back()->with("status", "Vos métasections ont bien étés enregistrées !");
    }

    public function updateMetaSection(Request $request, $id){
        $this->validate($request, [
            'meta_title_home'       => 'required',
            'meta_keyword_home'     => 'required',
            'meta_description_home' => 'required'
        ]);

        $metaSection = MetaSection::find($id);
        $metaSection->meta_title_home = $request->input('meta_title_home');
        $metaSection->meta_keyword_home = $request->input('meta_keyword_home');
        $metaSection->meta_description_home = $request->input('meta_description_home');

        $metaSection->update();

        return back()->with("status", "Vos métasections ont bien étés mises à jour !");
    }

    public function saveFeaturedProduct(Request $request){
        $this->validate($request, [
            'featured_product_title'    => 'required',
            'featured_product_subtitle' => 'required'
        ]);

        $featuredProduct = new FeaturedProduct();
        $featuredProduct->featured_product_title = $request->input('featured_product_title');
        $featuredProduct->featured_product_subtitle = $request->input('featured_product_subtitle');

        $featuredProduct->save();

        return back()->with("status", "Vos préférences pour la section des produits phares ont été enregistrées !");
    }

    public function updateFeaturedProduct(Request $request, $id){
        $this->validate($request, [
            'featured_product_title'    => 'required',
            'featured_product_subtitle' => 'required'
        ]);

        $featuredProduct = FeaturedProduct::find($id);
        $featuredProduct->featured_product_title = $request->input('featured_product_title');
        $featuredProduct->featured_product_subtitle = $request->input('featured_product_subtitle');

        $featuredProduct->update();

        return back()->with("status", "Vos préférences pour la section des produits phares ont été mises à jour !");
    }

   public function saveLatestProductSection(Request $request){
    $this->validate($request, [
        'latest_product_title'      => 'required',
        'latest_product_subtitle'   => 'required'
    ]);

    $latestProductSection = new LatestProductSection();
    $latestProductSection->latest_product_title = $request->input('latest_product_title');
    $latestProductSection->latest_product_subtitle = $request->input('latest_product_subtitle');

    $latestProductSection->save();

    return back()->with("status", "Vos préférences pour la section des derniers produits ont bien été enregistrées !");
   }

   public function updateLatestProductSection(Request $request, $id){
    $this->validate($request, [
        'latest_product_title'      => 'required',
        'latest_product_subtitle'   => 'required'
    ]);

    $latestProductSection = LatestProductSection::find($id);
    $latestProductSection->latest_product_title = $request->input('latest_product_title');
    $latestProductSection->latest_product_subtitle = $request->input('latest_product_subtitle');

    $latestProductSection->update();

    return back()->with("status", "Vos préférences pour la section des derniers produits ont bien été mises à jour !");
   }

   public function savePopularProductSection(Request $request){
    $this->validate($request, [
        'popular_product_title'     => 'required',
        'popular_product_subtitle'  => 'required'
    ]);

    $popularProductSection = new PopularProductSection();

    $popularProductSection->popular_product_title = $request->input('popular_product_title');
    $popularProductSection->popular_product_subtitle = $request->input('popular_product_subtitle');

    $popularProductSection->save();

    return back()->with("status", "Vos préférences pour la section des produits les plus populaires ont bien été enregistrés !");

   }

   public function updatePopularProductSection(Request $request, $id){
    $this->validate($request, [
        'popular_product_title'     => 'required',
        'popular_product_subtitle'  => 'required'
    ]);

    $popularProductSection = PopularProductSection::find($id);

    $popularProductSection->popular_product_title = $request->input('popular_product_title');
    $popularProductSection->popular_product_subtitle = $request->input('popular_product_subtitle');

    $popularProductSection->update();

    return back()->with("status", "Vos préférences pour la section des produits les plus populaires ont bien été mises à jour !");

   }

   public function saveNewsletterSection(Request $request){
    $this->validate($request, [
        'newsletter_text'   => 'required'
    ]);

    $newsletterSection = new NewsletterSection();
    $newsletterSection->newsletter_text = $request->input('newsletter_text');
    $newsletterSection->save();

    return back()->with("status", "Vos préférences pour la Section Newsletter ont bien été enregistrées !");

   }

   public function updateNewsletterSection(Request $request, $id){
    $this->validate($request, [
        'newsletter_text'   => 'required'
    ]);

    $newsletterSection = NewsletterSection::find($id);
    $newsletterSection->newsletter_text = $request->input('newsletter_text');
    $newsletterSection->update();

    return back()->with("status", "Vos préférences pour la Section Newsletter ont bien été mises à jour !");

   }


}
