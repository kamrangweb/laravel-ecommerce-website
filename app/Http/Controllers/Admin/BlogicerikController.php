<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BlogIcerik;
use App\Models\Blogkategoriler;

class BlogicerikController extends Controller
{
    //
    public function  IcerikListe(){
        $blogicerik = BlogIcerik::latest()->get();
        return view('admin.blogicerik.icerik_liste',compact('blogicerik'));

    }

    public function  BlogicerikEkle(Request $request){
        $kategoriler = Blogkategoriler::latest()->get();
      
        return view('admin.blogicerik.blogicerik_ekle',compact('kategoriler'));
        // return view('admin.urunler.urun_liste',compact('urunliste'));

    }
    public function BlogicerikEkleForm(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);

        $request->validate([
            'baslik'=>'required',
        ],
        [
            'baslik.required'=>'Baslik bos olamaz',

        ]);

            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/blogicerik/'),$resimadi);
            $resim_kaydet = 'upload/blogicerik/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);


            BlogIcerik::insert([
                'kategori_id'=>$request->kategori_id,
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
    
            return Redirect()->route('icerik.liste')->with($mesaj);

     

        $request->save();

    }

    public function BlogIcerikDuzenle($id){
        $kategoriler = Blogkategoriler::latest()->get();
        $icerikler = BlogIcerik::findOrFail($id);
        // $urunler = Urunler::findOrFail($id);

        // return view('admin.urunler.urun_duzenle',compact('kategoriler','icerikler'));
        return view('admin.blogicerik.blogicerik_duzenle',compact('kategoriler','icerikler'));

    }

    

    public function BlogicerikGuncelleForm(Request $request){
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
            $resim->move(public_path('upload/blogicerik/'),$resimadi);
            $resim_kaydet = 'upload/blogicerik/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);

            //eski resim sil
            if(file_exists($eski_resim)){
                unlink($eski_resim);
            }
            //eski resim sil
            BlogIcerik::findOrFail($urun_id)->update([
                'kategori_id'=>$request->kategori_id,
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
    
            return Redirect()->route('icerik.liste')->with($mesaj);

        }else{
            BlogIcerik::findOrFail($urun_id)->update([
                'kategori_id'=>$request->kategori_id,
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
                'bildirim'=>'resimsiz başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('icerik.liste')->with($mesaj);
        }
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));


            $request->save();

    }

    

    
    public function  BlogicerikDurum(Request $request){
        $urun = BlogIcerik::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success'=>'Basarili']);
        // return view('admin.urunler.urun_liste',compact('urunliste'));

    }
    
    
    public function BlogicerikSil($id){
        $urun_id = BlogIcerik::findOrFail($id);
        $resim = $urun_id->resim;

        if(file_exists($resim)){
            unlink($resim);
        }


        BlogIcerik::findOrFail($id)->delete();

        $mesaj = array(
            'bildirim'=>'Silme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->back()->with($mesaj);
    }
    


}
