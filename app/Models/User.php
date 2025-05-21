<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use DB;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'resim',
        'otp_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'otp_verified' => 'boolean',
    ];
   
   
    public static function IzinGruplari(){
        $izin_gruplari = DB::table('permissions')->select('grup_adi')->groupBy('grup_adi')->get();
        return $izin_gruplari;
    }
   
    public static function YetkiGruplari($grup_adi){
        $yetki = DB::table('permissions')->select('name','id')->where('grup_adi',$grup_adi)->get();
        return $yetki;
    }
   
   
    
    public static function RolYetkileri($rol,$yetkigrup){
        $yetkiIzinleri=true;
        foreach ($yetkigrup as $yetkiler) {
            # code...
            if(!$rol->hasPermissionTo($yetkiler->name)){
                $yetkiIzinleri = false;
                return $yetkiIzinleri;
            }
            return $yetkiIzinleri;

        }
    }
}
