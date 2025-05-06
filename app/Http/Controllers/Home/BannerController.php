<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

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
        // $manager = new ImageManager(['driver' => 'imagick']);
        $banner_id = $request->id;

        if($request->file('resim')){
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('upload/banner'),$resimadi);
            $resim_kaydet = 'upload/banner/'.$resimadi;

            // $homebanner->save('upload/banner/'.$resimadi);


            Banner::findOrFail($banner_id)->update([
                'baslik'=>$request->baslik,
                'alt_baslik'=>$request->alt_baslik,
                'url'=>$request->url,
                'video_url'=>$request->video_url,
                'resim'=>$resim_kaydet,
            ]);


            $mesaj = array(
                'bildirim'=>'resim başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->back()->with($mesaj);

        }else{
            Banner::findOrFail($banner_id)->update([
                'baslik'=>$request->baslik,
                'alt_baslik'=>$request->alt_baslik,
                'url'=>$request->url,
                'video_url'=>$request->video_url,
            ]);


            $mesaj = array(
                'bildirim'=>'resimsiz başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
    
            return Redirect()->back()->with($mesaj);
        }
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));


            $homebanner->save();

    }//function end
}//class end
