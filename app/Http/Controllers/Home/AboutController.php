<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;
use Image;

class AboutController extends Controller
{
    public function aboutFront()
    {
        $about = About::find(1);
        return view('frontend.home.home_about', compact('about'));
    }

    public function about()
    {
        $about = About::find(1);
        return view('admin.anasayfa.about_edit', compact('about'));
    }

    public function updateAbout(Request $request)
    {
        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(523,605)->save('upload/about/'.$name_gen);
            $save_url = 'upload/about/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Page Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About Page Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function multipleImage()
    {
        return view('admin.anasayfa.coklu_resim');
    }

    public function multipleForm(Request $request)
    {
        $image = $request->file('multi_image');

        foreach($image as $multi_image) {
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Multiple Images Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function multipleList()
    {
        $allMultiImage = MultiImage::all();
        return view('admin.anasayfa.coklu_resim_liste', compact('allMultiImage'));
    }

    public function multipleEdit($id)
    {
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.anasayfa.coklu_resim_duzenle', compact('multiImage'));
    }

    public function multipleUpdate(Request $request)
    {
        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Multi Image Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('multiple.list')->with($notification);
        }
    }

    public function multipleDelete($id)
    {
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
} 