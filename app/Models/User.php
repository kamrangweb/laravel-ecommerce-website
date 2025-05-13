<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use DB;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'resim',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
   
   
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
