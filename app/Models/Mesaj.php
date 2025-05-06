<?php

namespace App\Models;
use App\Mail\MailGonder;
use Mail;


use Illuminate\Database\Eloquent\Model;

class Mesaj extends Model
{
    //

    public $fillable=['adi','email','telefon','konu','mesaj'];

    public static function boot(){
        parent::boot();

        static::created(function ($bilgi){
            $adminEmail = "exampletest@gmail.com";
            Mail::to($adminEmail)->send(new MailGonder($bilgi));
        });
    }
}
