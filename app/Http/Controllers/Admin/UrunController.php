<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use App\Models\Urunler;

class UrunController extends Controller
{
    //

    public function  UrunListe(){
        $urunliste = Urunler::latest()->get();
        return view('admin.urunler.urun_liste',compact('urunliste'));

    }
    
    public function  UrunDurum(Request $request){
        $urun = Urunler::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success'=>'Basarili']);
        // return view('admin.urunler.urun_liste',compact('urunliste'));

    }
    
    
    public function  UrunEkle(Request $request){
        $kategoriler = Kategoriler::latest()->get();
      
        return view('admin.urunler.urun_ekle',compact('kategoriler'));
        // return view('admin.urunler.urun_liste',compact('urunliste'));

    }

    public function UrunEkleForm(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);

        $request->validate([
            'baslik'=>'required',
        ],
        [
            'baslik.required'=>'Baslik bos olamaz',

        ]);

            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/urunler/'),$resimadi);
            $resim_kaydet = 'upload/urunler/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);


            Urunler::insert([
                'kategori_id'=>$request->kategori_id,
                'altkategori_id'=>$request->altkategori_id,
                'baslik'=>$request->baslik,
                'url'=>str()->slug($request->baslik),
                
                'tag'=>$request->tag,
                'metin'=>$request->metin,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'sirano'=>$request->sirano,
                'resim'=>$resim_kaydet,
                'durum'=>1,
                'created_at'=>Carbon::now()
            ]);


            $mesaj = array(
                'bildirim'=>'resim başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('urun.liste')->with($mesaj);

     

        $request->save();

    }

    public function UrunDuzenle($id){
        $kategoriler = Kategoriler::latest()->get();
        $altkategoriler = ALtkategoriler::latest()->get();
        $urunler = Urunler::findOrFail($id);

        return view('admin.urunler.urun_duzenle',compact('kategoriler','altkategoriler','urunler'));
    }
    public function UrunGuncelle(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);

        $request->validate([
            'baslik'=>'required',
        ],
        [
            'baslik.required'=>'bos olmaaz',

        ]);

        $urun_id = $request->id;
        $eski_resim = $request->onceki_resim;


        if($request->file('resim')){
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/urunler/'),$resimadi);
            $resim_kaydet = 'upload/urunler/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);

            //eski resim sil
            if(file_exists($eski_resim)){
                unlink($eski_resim);
            }
            //eski resim sil
            Urunler::findOrFail($urun_id)->update([
                'kategori_id'=>$request->kategori_id,
                'altkategori_id'=>$request->altkategori_id,
                'baslik'=>$request->baslik,
                'url'=>str()->slug($request->baslik),
                
                'tag'=>$request->tag,
                'metin'=>$request->metin,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'sirano'=>$request->sirano,
                'resim'=>$resim_kaydet,
            ]);


            $mesaj = array(
                'bildirim'=>'resim guncelleme başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('urun.liste')->with($mesaj);

        }else{
            Urunler::findOrFail($urun_id)->update([
                'kategori_id'=>$request->kategori_id,
                'altkategori_id'=>$request->altkategori_id,
                'baslik'=>$request->baslik,
                'url'=>str()->slug($request->baslik),
                
                'tag'=>$request->tag,
                'metin'=>$request->metin,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'sirano'=>$request->sirano,
            ]);


            $mesaj = array(
                'bildirim'=>'resimsiz başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('urun.liste')->with($mesaj);
        }
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));


            $request->save();

    }

    public function UrunSil($id){
        $urun_id = Urunler::findOrFail($id);
        $resim = $urun_id->resim;

        if(file_exists($resim)){
            unlink($resim);
        }


        Urunler::findOrFail($id)->delete();

        $mesaj = array(
            'bildirim'=>'Silme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->back()->with($mesaj);
    }
    



}
