<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use App\Models\Hakkimizda;
use App\Models\Cokluresim;
use Illuminate\Support\Carbon;


class HakkimizdaController extends Controller
{
    //

    public function Hakkimizda(){
        $hakkimizda = Hakkimizda::find(1);
        return view('admin.anasayfa.hakkimizda_duzenle',compact('hakkimizda'));
    }//function end

    public function HakkimizdaGuncelle(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);
        $hakkimizda_id = $request->id;
        $eski_resim = $request->onceki_resim;

        if($request->file('resim')){
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/hakkimizda'),$resimadi);
            $resim_kaydet = 'upload/hakkimizda/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);
             //eski resim sil
             if(file_exists($eski_resim)){
                unlink($eski_resim);
            }
            //eski resim sil

            Hakkimizda::findOrFail($hakkimizda_id)->update([
                'baslik'=>$request->baslik,
                'kisa_baslik'=>$request->kisa_baslik,
                'kisa_aciklama'=>$request->kisa_aciklama,
                'aciklama'=>$request->aciklama,
                'resim'=>$resim_kaydet,
            ]);


            $mesaj = array(
                'bildirim'=>'resim başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->back()->with($mesaj);

        }else{
            Hakkimizda::findOrFail($hakkimizda_id)->update([
                'baslik'=>$request->baslik,
                'kisa_baslik'=>$request->kisa_baslik,
                'kisa_aciklama'=>$request->kisa_aciklama,
                'aciklama'=>$request->aciklama,
            ]);


            $mesaj = array(
                'bildirim'=>'resimsiz başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->back()->with($mesaj);
        }
            $hakkimizda->save();

    }//function end

    
    public function HakkimizdaFront(){
        $hakkimizda = Hakkimizda::find(1);
        return view('frontend.anasayfa.hakkimizda',compact('hakkimizda'));
    }//function end
   
   
    public function CokluResim(){
        $hakkimizda = Hakkimizda::find(1);
        return view('admin.anasayfa.coklu_resim',compact('hakkimizda'));
    }//function end
    
    
    public function CokluForm(Request $request){
        $resimler = $request->file('resim');

        foreach ($resimler as $resim) {
            # code...
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/coklu'),$resimadi);
            $resim_kaydet = 'upload/coklu/'.$resimadi;

            Cokluresim::insert([
                'resim'=>$resim_kaydet,
                // 'durum'=>1,
                'created_at'=>Carbon::now()
            ]);

            $mesaj = array(
                'bildirim'=>'Coklu resim başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            // return Redirect()->back()->with($mesaj);
        return Redirect()->route('coklu.liste')->with($mesaj);



            
        }

        $request->save();
}//function end





public function CokluListe(){
    $coklu_resimler = Cokluresim::all();
    return view('admin.anasayfa.coklu_liste',compact('coklu_resimler'));
}//function end

public function CokluDuzenle($id){
    $resim = Cokluresim::findOrFail($id);

    return view('admin.anasayfa.coklu_duzenle',compact('resim'));
}//function end

public function CokluGuncelle(Request $request){
    // $manager = new ImageManager(['driver' => 'imagick']);

    $request->validate([
        'resim'=>'required',
    ],
    [
        'resim.required'=>'bos olmaaz',

    ]);

    $id = $request->id;
    $eski_resim = $request->onceki_resim;


    if($request->file('resim')){
        $resim = $request->file('resim');
        $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
        $resim->move(public_path('upload/coklu'),$resimadi);
        $resim_kaydet = 'upload/coklu/'.$resimadi;

        // $homebanner->save('upload/banner/'.$resimadi);

        //eski resim sil
        if(file_exists($eski_resim)){
            unlink($eski_resim);
        }
        //eski resim sil
        Cokluresim::findOrFail($id)->update([
            'resim'=>$resim_kaydet,
        ]);


        $mesaj = array(
            'bildirim'=>'Coklu resim guncelleme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->route('coklu.liste')->with($mesaj);

    }
}


public function CokluSil($id){
    $resim_id = Cokluresim::findOrFail($id);

    $resim = $resim_id->resim;
    unlink($resim);

    Cokluresim::findOrFail($id)->delete();

    $mesaj = array(
        'bildirim'=>'Silme başarılı.',
        'alert-type'=>'success'
    );
    //bildirim

    return Redirect()->back()->with($mesaj);
}

    

}
