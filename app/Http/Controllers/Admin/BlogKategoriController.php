<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BlogKategoriler;
use App\Models\Urunler;



class BlogKategoriController extends Controller
{
    //

    public function  BlogListe(){
        $blogliste = BlogKategoriler::latest()->get();
        return view('admin.blogkategoriler.blog_liste',compact('blogliste'));

    }

    
       
    public function  BlogKategoriDurum(Request $request){
        $urun = BlogKategoriler::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success'=>'Basarili']);
        // return view('admin.urunler.urun_liste',compact('urunliste'));

    }
    

    public function  BlogKategoriEkle(Request $request){
        // $kategoriler = Kategoriler::latest()->get();
      
        return view('admin.blogkategoriler.blogkategori_ekle');
        // return view('admin.urunler.urun_liste',compact('urunliste'));

    }
    public function BlogKategoriForm(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);

        $request->validate([
            'kategori_adi'=>'required',
        ],
        [
            'kategori_adi.required'=>'kategori_adi bos olamaz',

        ]);


            // $homebanner->save('upload/banner/'.$resimadi);


            BlogKategoriler::insert([
                'kategori_adi'=>$request->kategori_adi,
                'url'=>str()->slug($request->kategori_adi),
                
                'sirano'=>$request->sirano,
                'durum'=>1,
                'created_at'=>Carbon::now()
            ]);


            $mesaj = array(
                'bildirim'=>'Blog kategori ekleme başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('blog.liste')->with($mesaj);

     

        $request->save();

    }

    
    public function BlogKategoriDuzenle($id){
        $BlogKategoriDuzenle = BlogKategoriler::findOrFail($id);
        return view('admin.blogkategoriler.blog_kategori_duzenle',compact('BlogKategoriDuzenle'));
    }

    public function BlogKategoriGuncelle(Request $request){
        // $manager = new ImageManager(['driver' => 'imagick']);

        $request->validate([
            'kategori_adi'=>'required',
        ],
        [
            'kategori_adi.required'=>'bos olmaaz',

        ]);

        $kategori_id = $request->id;



       
        BlogKategoriler::findOrFail($kategori_id)->update([
                'kategori_adi'=>$request->kategori_adi,
                'url'=>str()->slug($request->kategori_adi),
                
                'sirano'=>$request->sirano,
            ]);


            $mesaj = array(
                'bildirim'=>'resim guncelleme başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->route('blog.liste')->with($mesaj);





    }

    
    public function BlogKategoriSil($id){
       

        BlogKategoriler::findOrFail($id)->delete();

        $mesaj = array(
            'bildirim'=>'Silme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->back()->with($mesaj);
    }

}
