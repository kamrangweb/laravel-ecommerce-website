<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Altkategoriler;
use App\Models\Kategoriler;

class AltkategoriController extends Controller
{
    //
    public function  AltkategoriListe(){
        $altkategoriler = Altkategoriler::latest()->get();
        return view('admin.altkategoriler.altkategori_liste',compact('altkategoriler'));
    }
    
    //
    public function  AltkategoriEkle(){
        $kategorigoster = Kategoriler::latest()->get();
        return view('admin.altkategoriler.altkategori_ekle',compact('kategorigoster'));
    }

    public function AltKategoriEkleForm(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);

        $request->validate([
            'altkategori_adi'=>'required',
        ],
        [
            'altkategori_adi.required'=>'bos olmaaz',

        ]);

        if($request->file('resim')){
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/altkategoriler/'),$resimadi);
            $resim_kaydet = 'upload/altkategoriler/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);


            Altkategoriler::insert([
                'kategori_id'=>$request->kategori_id,
                'altkategori_adi'=>$request->altkategori_adi,
                'altkategori_url'=>str()->slug($request->altkategori_adi),
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
    
            return Redirect()->route('altkategori.liste')->with($mesaj);

        }else{
            Altkategoriler::insert([
                'kategori_id'=>$request->id,
                'altkategori_adi'=>$request->altkategori_adi,
                'altkategori_url'=>str()->slug($request->altkategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'created_at'=>Carbon::now()
            ]);


            $mesaj = array(
                'bildirim'=>'resimsiz başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('altkategori.liste')->with($mesaj);
        }
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));

        $request->save();

    }

    public function AltKategoriDuzenle($id){
        $kategoriler = Kategoriler::orderBy('kategori_adi','ASC')->get();
        $altkategoriler = ALtkategoriler::findOrFail($id);

        return view('admin.altkategoriler.altkategori_duzenle',compact('kategoriler','altkategoriler'));
    }

    public function AltKategoriForm(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);

        $request->validate([
            'altkategori_adi'=>'required',
        ],
        [
            'altkategori_adi.required'=>'bos olmaaz',

        ]);

        $altkategori_id = $request->id;
        $eski_resim = $request->onceki_resim;


        if($request->file('resim')){
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/altkategoriler/'),$resimadi);
            $resim_kaydet = 'upload/altkategoriler/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);

            //eski resim sil
            if(file_exists($eski_resim)){
                unlink($eski_resim);
            }
            //eski resim sil
            Altkategoriler::findOrFail($altkategori_id)->update([
                'kategori_id'=>$request->kategori_id,
                'altkategori_adi'=>$request->altkategori_adi,
                'altkategori_url'=>str()->slug($request->altkategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'resim'=>$resim_kaydet,
            ]);


            $mesaj = array(
                'bildirim'=>'resim guncelleme başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('altkategori.liste')->with($mesaj);

        }else{
            Altkategoriler::findOrFail($altkategori_id)->update([
                'kategori_id'=>$request->kategori_id,
                'altkategori_adi'=>$request->altkategori_adi,
                'altkategori_url'=>str()->slug($request->altkategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama
            ]);


            $mesaj = array(
                'bildirim'=>'resimsiz başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('altkategori.liste')->with($mesaj);
        }
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));


            $request->save();

    }

    
    public function AltKategoriSil($id){
        $altkategori_id = Altkategoriler::findOrFail($id);
        $resim = $altkategori_id->resim;

        unlink($resim);

        Altkategoriler::findOrFail($id)->delete();

        $mesaj = array(
            'bildirim'=>'Silme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->back()->with($mesaj);
    }
    
    //getir ajax 2
    public function AltAjax($kategori_id){
        $altgetir = Altkategoriler::where('kategori_id',$kategori_id)->orderBy('altkategori_adi','ASC')->get();
        return json_encode($altgetir);
    }

}
