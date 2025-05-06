<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Footer;


class FooterController extends Controller
{
    //

    public function FooterDuzenle(){
        $footer = Footer::find(1);
        return view('admin.anasayfa.footer_duzenle',compact('footer'));
    }//function end FooterGuncelle
   
   
    public function FooterGuncelle(Request $request){
        $footer_id = $request->id;


        Footer::findOrFail($footer_id)->update([
                'baslikbir'=>$request->baslikbir,
                'baslikiki'=>$request->baslikiki,
                // 'baslikuc'=>$request->baslik,
                'telefon'=>$request->telefon,
                'metin'=>$request->metin,
                'sehir'=>$request->sehir,
                'email'=>$request->email,
                'adres'=>$request->adres,
                'sosyal_baslik'=>$request->sosyal_baslik,
                // 'aciklama'=>$request->kisa_aciklama,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'instagram'=>$request->instagram,
            ]);


            $mesaj = array(
                'bildirim'=>' başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->back()->with($mesaj);


            

    }//function end


}
