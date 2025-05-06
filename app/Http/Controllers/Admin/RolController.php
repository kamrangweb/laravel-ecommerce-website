<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RolController extends Controller
{
    //

    
    public function  IzinListe(){
        $izinler = Permission::all();
        return view('admin.rol.izin_liste',compact('izinler'));

    }
  
    public function  IzinEkle(){
        // $izinler = Permission::all();
        return view('admin.rol.izin_ekle');

    }
   
    public function  IzinForm(Request $request){
        $rol = Permission::create([
            'name'=>$request->name,
            'grup_adi'=>$request->grup_adi,
        ]);
        $mesaj = array(
            'bildirim'=>'Izin ekleme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->route('izin.liste')->with($mesaj);
        // return view('admin.rol.izin_ekle');

    }

    
    
    public function  IzinDuzenle($id){
        $izinler = Permission::findOrFail($id);
        return view('admin.rol.izin_duzenle',compact('izinler'));

    }
    
    public function  IzinGuncelle(Request $request){
        $izin_id = $request->id;
        Permission::findOrFail($izin_id)->update([
            'name'=>$request->name,
            'grup_adi'=>$request->grup_adi,

        ]);
        $mesaj = array(
            'bildirim'=>'Izin guncelleme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->route('izin.liste')->with($mesaj);
        // return view('admin.rol.izin_ekle');

    }
    

    public function  IzinSil($id){
        Permission::findOrFail($id)->delete();
        
        $mesaj = array(
        'bildirim'=>'Izin SILME başarılı.',
        'alert-type'=>'success'
    );
    //bildirim

        return Redirect()->back()->with($mesaj);

    }


    /////////////////////////ROL///////////////////////////////



    
    public function  RolListe(){
        $rol = Role::all();
        return view('admin.rol.rol_liste',compact('rol'));

    }    


    
    public function  RolEkle(){
        // $rol = Role::all();
        return view('admin.rol.rol_ekle');

    }    

    

    public function  RolForm(Request $request){
        $rol = Role::create([
            'name'=>$request->name,
        ]);
        $mesaj = array(
            'bildirim'=>'ROL ekleme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->route('rol.liste')->with($mesaj);
        // return view('admin.rol.izin_ekle');

    }
    


    public function  RolDuzenle($id){
        $rol = Role::findOrFail($id);
        return view('admin.rol.rol_duzenle',compact('rol'));

    }
    
    public function  RolGuncelle(Request $request){
        $rol_id = $request->id;
        Role::findOrFail($rol_id)->update([
            'name'=>$request->name,

        ]);
        $mesaj = array(
            'bildirim'=>'Rol guncelleme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->route('rol.liste')->with($mesaj);
        // return view('admin.rol.izin_ekle');

    }
    

    public function  RolSil($id){
        Role::findOrFail($id)->delete();
        
        $mesaj = array(
        'bildirim'=>'ROL SILME başarılı.',
        'alert-type'=>'success'
    );
    //bildirim

        return Redirect()->back()->with($mesaj);

    }
    /////////////////Rollere Yetki verme////////////////

    
    public function  RolIzinVerme(){
        $roller = Role::all();
        $izinler = Permission::all();
        $izin_gruplari = User::IzinGruplari();

        // Role::findOrFail($id)->delete();
      

        return view('admin.rol.rol_izin_ver',compact('roller','izinler','izin_gruplari'));
      
    }
   
   
    public function  RolYetkiVer(Request $request){
        $data = array();
        $yetkiler = $request->yetki;
            
        foreach ($yetkiler as $key => $item) {
            # code...
            $data['role_id'] = $request->rol_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);

        }

        $mesaj = array(
            'bildirim'=>'ROL SILME başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->route('rol.liste')->with($mesaj);

      
    }


    public function  RolYetkiListe(){
        $rol = Role::all();
        // $izinler = Permission::all();
        // $izin_gruplari = User::IzinGruplari();

        // Role::findOrFail($id)->delete();
      

        return view('admin.rol.rol_yetki_liste',compact('rol'));
      
    }
    public function  RolYetkiDuzenle($id){
        if (!$id) {
            return redirect()->back();
        }
        $rol = Role::findOrFail($id);
        $yetkiler = Permission::all();
        $izin_gruplari = User::IzinGruplari();

        // Role::findOrFail($id)->delete();
      

        return view('admin.rol.rol_yetki_duzenle',compact('rol','yetkiler','izin_gruplari'));
      
    }
   
   
    public function  RolYetkiGuncelle(Request $request,$id){
      
        $rol = Role::findOrFail($id);
        $secili_yetkiler = $request->yetki;
        // Role::findOrFail($id)->delete();
      
        if(!empty($secili_yetkiler)){
            $rol->syncPermissions($secili_yetkiler);

        }
        $mesaj = array(
            'bildirim'=>'ROL guncelleme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->route('rol.yetki.liste')->with($mesaj);
    }
       
}
