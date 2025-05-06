<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Kategoriler;

class KategoriController extends Controller
{
    //

    public function  KategoriHepsi(){
        $kategorihepsi = Kategoriler::latest()->get();
        return view('admin.kategoriler.kategoriler_hepsi',compact('kategorihepsi'));

    }
    
    public function  KategoriEkle(){
        return view('admin.kategoriler.kategoriler_ekle');

    }


    public function KategoriEkleForm(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);

        $request->validate([
            'kategori_adi'=>'required',
        ],
        [
            'kategori_adi.required'=>'bos olmaaz',

        ]);

        if($request->file('resim')){
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/kategoriler/'),$resimadi);
            $resim_kaydet = 'upload/kategoriler/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);


            Kategoriler::insert([
                'kategori_adi'=>$request->kategori_adi,
                'kategori_url'=>str()->slug($request->kategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'resim'=>$resim_kaydet,
                'created_at'=>Carbon::now()
            ]);


            $mesaj = array(
                'bildirim'=>'resim başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('kategori.hepsi')->with($mesaj);

        }else{
            Kategoriler::insert([
                'kategori_adi'=>$request->kategori_adi,
                'kategori_url'=>str()->slug($request->kategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'created_at'=>Carbon::now()
            ]);


            $mesaj = array(
                'bildirim'=>'resimsiz başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('kategori.hepsi')->with($mesaj);
        }
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));


            $request->save();

    }




    public function KategoriDuzenle($id){
        $KategoriDuzenle = Kategoriler::findOrFail($id);
        return view('admin.kategoriler.kategori_duzenle',compact('KategoriDuzenle'));
    }

    public function KategoriGuncelleForm(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);

        $request->validate([
            'kategori_adi'=>'required',
        ],
        [
            'kategori_adi.required'=>'bos olmaaz',

        ]);

        $kategori_id = $request->id;
        $eski_resim = $request->onceki_resim;


        if($request->file('resim')){
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/kategoriler/'),$resimadi);
            $resim_kaydet = 'upload/kategoriler/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);

            //eski resim sil
            if(file_exists($eski_resim)){
                unlink($eski_resim);
            }
            //eski resim sil
            Kategoriler::findOrFail($kategori_id)->update([
                'kategori_adi'=>$request->kategori_adi,
                'kategori_url'=>str()->slug($request->kategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'resim'=>$resim_kaydet,
            ]);


            $mesaj = array(
                'bildirim'=>'resim guncelleme başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('kategori.hepsi')->with($mesaj);

        }else{
            Kategoriler::findOrFail($kategori_id)->update([
                'kategori_adi'=>$request->kategori_adi,
                'kategori_url'=>str()->slug($request->kategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'created_at'=>Carbon::now()
            ]);


            $mesaj = array(
                'bildirim'=>'resimsiz başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('kategori.hepsi')->with($mesaj);
        }
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));


            $request->save();

    }


    public function KategoriSil($id){
        $kategori_id = Kategoriler::findOrFail($id);
        $resim = $kategori_id->resim;

        unlink($resim);

        Kategoriler::findOrFail($id)->delete();

        $mesaj = array(
            'bildirim'=>'Silme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->back()->with($mesaj);
    }
    
}
