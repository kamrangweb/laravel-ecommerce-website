<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use App\Models\Urunler;
use App\Models\BlogIcerik;
use App\Models\Blogkategoriler;



class FrontController extends Controller
{
    //

    public function UrunDetay($id,$url){
        $urunler = Urunler::findOrFail($id);
        $etiketler = $urunler->tag;
        $etiket = explode(',',$etiketler);


        return view('frontend.urunler.urun_detay',compact('urunler','etiket'));
    }
    
    
    public function KategoriDetay(Request $id,$url,$request){
        $urunler = Urunler::where('durum',1)->where('kategori_id',$id)->orderBy('sirano','ASC')->get();
        $kategoriler = Kategoriler::orderBy('kategori_adi','ASC')->get();
        $kategori = Kategoriler::where('id',$id)->first();

        return view('frontend.urunler.kategori_detay',compact('urunler','kategoriler','kategori'));
    }

    
    public function AltDetay(Request $id,$url,$request){
        $urunler = Urunler::where('durum',1)->where('altkategori_id',$id)->orderBy('sirano','ASC')->get();
        $altkategoriler = Altkategoriler::orderBy('altkategori_adi','ASC')->get();
        $altkategori = Altkategoriler::where('id',$id)->first();

        return view('frontend.urunler.altkategori_detay',compact('urunler','altkategoriler','altkategori'));
    }
    
    public function IcerikDetay( $id){
        $icerikHepsi = BlogIcerik::where('durum',1)->orderBy('sirano','ASC')->get();
        $icerik = BlogIcerik::findOrFail($id);
        $kategoriler = Blogkategoriler::where('durum',1)->orderBy('sirano','ASC')->get();
        $etiket = $icerik->tag;
        $etiketler = explode(',',$etiket);

        return view('frontend.blog.icerik_detay',compact('icerikHepsi','icerik','kategoriler','etiketler'));
    }
   
    public function Kategori_Detay($id){
        $blogpost = BlogIcerik::where('durum',1)->where('kategori_id',$id)->orderBy('sirano','ASC')->get();
        $icerikHepsi = BlogIcerik::where('durum',1)->orderBy('sirano','ASC')->get();
        $kategoriler = Blogkategoriler::where('durum',1)->orderBy('sirano','ASC')->get();
        $kategoriAdi = Blogkategoriler::findOrFail($id);
      
        return view('frontend.blog.kategori_detay',compact('icerikHepsi','blogpost','kategoriler','kategoriAdi'));
    }
   
   
    public function BlogHepsi(){
        $kategoriler = Blogkategoriler::where('durum',1)->orderBy('sirano','ASC')->get();
        $icerikHepsi = BlogIcerik::where('durum',1)->orderBy('sirano','ASC')->paginate(2);

        // $kategoriAdi = Blogkategoriler::findOrFail($id);
      
        return view('frontend.blog.blog_hepsi',compact('icerikHepsi','kategoriler'));
    }

    public function shop()
    {
        $products = Urunler::where('durum', 1)->orderBy('sirano', 'ASC')->paginate(12);
        $categories = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
        
        return view('frontend.shop.index', compact('products', 'categories'));
    }

    public function categories()
    {
        $categories = Kategoriler::with('subcategories')->orderBy('kategori_adi', 'ASC')->get();
        return view('frontend.categories.index', compact('categories'));
    }

}
