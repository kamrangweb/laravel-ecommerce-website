<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

// require 'vendor.autoload.php';

// import the Intervention Image Manager Class
// use Intervention\Image\ImageManager;

class BannerController extends Controller
{
    //

    public function HomeBanner(){
        $homebanner = Banner::find(1);
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));
    }//function end
    
    public function BannerGuncelle(Request $request){
        $banner_id = $request->id;

        if($request->file('resim')){
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            
            // Store the image in the public directory
            $resim->move(public_path('upload/banner'), $resimadi);
            
            $resim_kaydet = 'upload/banner/'.$resimadi;

            Banner::findOrFail($banner_id)->update([
                'baslik' => $request->baslik,
                'alt_baslik' => $request->alt_baslik,
                'url' => $request->url,
                'video_url' => $request->video_url,
                'resim' => $resim_kaydet,
            ]);

            $mesaj = array(
                'bildirim' => 'Banner başarıyla güncellendi.',
                'alert-type' => 'success'
            );
    
            return Redirect()->back()->with($mesaj);
        }

        // If no image is uploaded, update without image
        Banner::findOrFail($banner_id)->update([
            'baslik' => $request->baslik,
            'alt_baslik' => $request->alt_baslik,
            'url' => $request->url,
            'video_url' => $request->video_url,
        ]);

        $mesaj = array(
            'bildirim' => 'Banner başarıyla güncellendi.',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($mesaj);
    }//function end
}//class end
