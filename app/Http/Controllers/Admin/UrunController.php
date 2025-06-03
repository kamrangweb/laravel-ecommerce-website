<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use App\Models\Urunler;

class ProductController extends Controller
{
    public function productList()
    {
        $productList = Urunler::latest()->get();
        return view('admin.urunler.urun_liste', compact('productList'));
    }
    
    public function productStatus(Request $request)
    {
        $product = Urunler::find($request->urun_id);
        $product->durum = $request->durum;
        $product->save();

        return response()->json(['success' => 'Successful']);
    }
    
    public function addProduct(Request $request)
    {
        $categories = Kategoriler::latest()->get();
        return view('admin.urunler.urun_ekle', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'baslik' => 'required',
        ],
        [
            'baslik.required' => 'Title cannot be empty',
        ]);

        $image = $request->file('resim');
        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/urunler/'), $imageName);
        $imagePath = 'upload/urunler/'.$imageName;

        Urunler::insert([
            'kategori_id' => $request->kategori_id,
            'altkategori_id' => $request->altkategori_id,
            'baslik' => $request->baslik,
            'url' => str()->slug($request->baslik),
            'tag' => $request->tag,
            'metin' => $request->metin,
            'anahtar' => $request->anahtar,
            'aciklama' => $request->aciklama,
            'sirano' => $request->sirano,
            'resim' => $imagePath,
            'durum' => 1,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Product added successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('urun.liste')->with($notification);
    }

    public function editProduct($id)
    {
        $categories = Kategoriler::latest()->get();
        $subcategories = Altkategoriler::latest()->get();
        $product = Urunler::findOrFail($id);

        return view('admin.urunler.urun_duzenle', compact('categories', 'subcategories', 'product'));
    }

    public function updateProduct(Request $request)
    {
        $request->validate([
            'baslik' => 'required',
        ],
        [
            'baslik.required' => 'Title cannot be empty',
        ]);

        $productId = $request->id;
        $oldImage = $request->onceki_resim;

        if($request->file('resim')) {
            $image = $request->file('resim');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/urunler/'), $imageName);
            $imagePath = 'upload/urunler/'.$imageName;

            if(file_exists($oldImage)) {
                unlink($oldImage);
            }

            Urunler::findOrFail($productId)->update([
                'kategori_id' => $request->kategori_id,
                'altkategori_id' => $request->altkategori_id,
                'baslik' => $request->baslik,
                'url' => str()->slug($request->baslik),
                'tag' => $request->tag,
                'metin' => $request->metin,
                'anahtar' => $request->anahtar,
                'aciklama' => $request->aciklama,
                'sirano' => $request->sirano,
                'resim' => $imagePath,
            ]);

            $notification = array(
                'message' => 'Product updated successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('urun.liste')->with($notification);
        }

        Urunler::findOrFail($productId)->update([
            'kategori_id' => $request->kategori_id,
            'altkategori_id' => $request->altkategori_id,
            'baslik' => $request->baslik,
            'url' => str()->slug($request->baslik),
            'tag' => $request->tag,
            'metin' => $request->metin,
            'anahtar' => $request->anahtar,
            'aciklama' => $request->aciklama,
            'sirano' => $request->sirano,
        ]);

        $notification = array(
            'message' => 'Product updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('urun.liste')->with($notification);
    }

    public function deleteProduct($id)
    {
        $product = Urunler::findOrFail($id);
        $image = $product->resim;

        if(file_exists($image)) {
            unlink($image);
        }

        Urunler::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
