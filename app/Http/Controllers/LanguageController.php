<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        // Check if language is supported
        if (array_key_exists($lang, config('languages.supported'))) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }
        
        return redirect()->back();
    }
} 