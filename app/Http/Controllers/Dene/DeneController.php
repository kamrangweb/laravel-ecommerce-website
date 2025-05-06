<?php

namespace App\Http\Controllers\Dene;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeneController extends Controller
{
    //

    public function iletFonksiyon(){
        return view('iletisim');
    }
    public function hakFonksiyon(){
        return view('hakkimizda');
    }
    
}
