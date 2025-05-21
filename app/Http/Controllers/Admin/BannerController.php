<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::with('images')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'baslik' => 'required|string|max:255',
            'alt_baslik' => 'nullable|string|max:255',
            'baslik_en' => 'nullable|string|max:255',
            'alt_baslik_en' => 'nullable|string|max:255',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titles.*' => 'nullable|string|max:255',
            'subtitles.*' => 'nullable|string|max:255',
            'orders.*' => 'nullable|integer|min:0'
        ]);

        $banner = Banner::create([
            'baslik' => $request->baslik,
            'alt_baslik' => $request->alt_baslik,
            'baslik_en' => $request->baslik_en,
            'alt_baslik_en' => $request->alt_baslik_en,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $path = $image->store('banners', 'public');
                
                BannerImage::create([
                    'banner_id' => $banner->id,
                    'image_path' => $path,
                    'title' => $request->titles[$key] ?? null,
                    'subtitle' => $request->subtitles[$key] ?? null,
                    'order' => $request->orders[$key] ?? 0,
                    'is_active' => true
                ]);
            }
        }

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        $banner->load('images');
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'baslik' => 'required|string|max:255',
            'alt_baslik' => 'nullable|string|max:255',
            'baslik_en' => 'nullable|string|max:255',
            'alt_baslik_en' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titles.*' => 'nullable|string|max:255',
            'subtitles.*' => 'nullable|string|max:255',
            'orders.*' => 'nullable|integer|min:0',
            'existing_images.*' => 'nullable|exists:banner_images,id'
        ]);

        $banner->update([
            'baslik' => $request->baslik,
            'alt_baslik' => $request->alt_baslik,
            'baslik_en' => $request->baslik_en,
            'alt_baslik_en' => $request->alt_baslik_en,
        ]);

        // Update existing images
        if ($request->has('existing_images')) {
            foreach ($request->existing_images as $key => $imageId) {
                $image = BannerImage::find($imageId);
                if ($image) {
                    $image->update([
                        'title' => $request->titles[$key] ?? null,
                        'subtitle' => $request->subtitles[$key] ?? null,
                        'order' => $request->orders[$key] ?? 0,
                    ]);
                }
            }
        }

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $path = $image->store('banners', 'public');
                
                BannerImage::create([
                    'banner_id' => $banner->id,
                    'image_path' => $path,
                    'title' => $request->new_titles[$key] ?? null,
                    'subtitle' => $request->new_subtitles[$key] ?? null,
                    'order' => $request->new_orders[$key] ?? 0,
                    'is_active' => true
                ]);
            }
        }

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        // Delete associated images from storage
        foreach ($banner->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        
        $banner->delete();

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully.');
    }

    public function deleteImage(BannerImage $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
} 