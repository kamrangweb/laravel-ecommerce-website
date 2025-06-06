<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Banner;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name', 'ASC')->limit(6)->get();
        $banner = Banner::find(1);
        return view('frontend.home', compact('categories', 'banner'));
    }
} 