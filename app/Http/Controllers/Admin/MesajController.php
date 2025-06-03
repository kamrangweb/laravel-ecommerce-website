<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Mesaj;


class MesajController extends Controller
{
    //

    
    public function  Iletisim(){
        // $kategorihepsi = Kategoriler::latest()->get();
        return view('frontend.mesaj.iletisim');

    }
   
   
    public function  TeklifFormu(Request $request){
        $request->validate([
            'adi'=>'required',
            'email'=>'required|email',
            'telefon'=>'required',
            'konu'=>'required',
            'mesaj'=>'required',
        ],
        [
            'adi.required'=>'bos olmaaz',
            'email.required'=>'bos olmaaz',
            'email.email'=>'bos olmaaz',
            'telefon.required'=>'bos olmaaz',
            'konu.required'=>'bos olmaaz',
            'mesaj.required'=>'bos olmaaz',

        ]);

        Mesaj::create($request->all());

        $mesaj = array(
            'notification'=>'We will get back to you soon.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->back()->with($mesaj);
    }


}
