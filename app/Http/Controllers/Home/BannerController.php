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
        return view('admin.homepage.banner_edit',compact('homebanner'));
    }//function end
    
    public function BannerGuncelle(Request $request){
        $banner_id = $request->id;

        if($request->file('image')){
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            // Store the image in the public directory
            $image->move(public_path('upload/banner'), $imageName);
            
            $imagePath = 'upload/banner/'.$imageName;

            Banner::findOrFail($banner_id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'url' => $request->url,
                'video_url' => $request->video_url,
                'image' => $imagePath,
            ]);

            $message = array(
                'notification' => 'Banner updated successfully.',
                'alert-type' => 'success'
            );
    
            return Redirect()->back()->with($message);
        }

        // If no image is uploaded, update without image
        Banner::findOrFail($banner_id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'url' => $request->url,
            'video_url' => $request->video_url,
        ]);

        $message = array(
            'notification' => 'Banner updated successfully.',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($message);
    }//function end

    public function bannerText()
    {
        $homebanner = Banner::find(1);
        return view('admin.homepage.banner_text_edit', compact('homebanner'));
    }

    public function bannerImage()
    {
        $homebanner = Banner::find(1);
        return view('admin.homepage.banner_image_edit', compact('homebanner'));
    }

    public function updateBannerText(Request $request)
    {
        $banner_id = $request->id;

        Banner::findOrFail($banner_id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'url' => $request->url,
            'video_url' => $request->video_url,
        ]);

        $message = array(
            'notification' => 'Banner text updated successfully.',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($message);
    }

    public function updateBannerImage(Request $request)
    {
        $banner_id = $request->id;

        if($request->file('image')){
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            // Store the image in the public directory
            $image->move(public_path('upload/banner'), $imageName);
            
            $imagePath = 'upload/banner/'.$imageName;

            Banner::findOrFail($banner_id)->update([
                'image' => $imagePath,
            ]);

            $message = array(
                'notification' => 'Banner image updated successfully.',
                'alert-type' => 'success'
            );
    
            return Redirect()->back()->with($message);
        }

        $message = array(
            'notification' => 'Please select an image.',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($message);
    }
}//class end
