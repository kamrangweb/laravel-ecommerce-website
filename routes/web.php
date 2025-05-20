<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AltkategoriController;
use App\Http\Controllers\Admin\UrunController;
use App\Http\Controllers\Admin\BlogKategoriController;
use App\Http\Controllers\Admin\BlogicerikController;
use App\Http\Controllers\Admin\MesajController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Controllers\Home\HakkimizdaController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\LanguageController;

//Teklif formu route

Route::controller(MesajController::class)->group(function () {
    Route::get('/iletisim', 'Iletisim')->name('iletisim');
    Route::post('/teklif/form', 'TeklifFormu')->name('teklif.form');
});



Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//Banner route

Route::controller(BannerController::class)->group(function () {
    Route::get('/banner/duzenle', 'HomeBanner')->name('banner');
    Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.home.guncelle');
});
//Footer route

Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/duzenle', 'FooterDuzenle')->name('footer.duzenle');
    Route::post('/footer/guncelle', 'FooterGuncelle')->name('footer.guncelle');
});

//HakkimizdaController route

Route::controller(HakkimizdaController::class)->group(function () {
    Route::get('/hakkimizda/duzenle', 'Hakkimizda')->name('hakkimizda');
    Route::post('/hakkimizda/guncelle', 'HakkimizdaGuncelle')->name('hakkimizda.guncelle');
    Route::get('/hakkimizda', 'HakkimizdaFront')->name('anasayfa.hakkimizda');
    Route::get('/coklu/resim', 'CokluResim')->name('coklu.resim');
    Route::post('/coklu/form', 'CokluForm')->name('coklu.resim.form');
    Route::get('/coklu/liste', 'CokluListe')->name('coklu.liste');
    Route::get('/coklu/duzenle/{id}', 'CokluDuzenle')->name('coklu.duzenle');
    
    Route::post('/coklu/guncelle', 'CokluGuncelle')->name('coklu.guncelle');

    Route::get('/coklu/sil/{id}', 'CokluSil')->name('coklu.sil');
    
});



//kategori route

Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori/hepsi', 'KategoriHepsi')->name('kategori.hepsi');
    Route::get('/kategori/ekle', 'KategoriEkle')->name('kategori.ekle');
    Route::post('/kategori/ekle/form', 'KategoriEkleForm')->name('kategori.ekle.form');
    Route::get('/kategori/duzenle/{id}', 'KategoriDuzenle')->name('kategori.duzenle');
    Route::post('/kategori/guncelle/form', 'KategoriGuncelleForm')->name('kategori.guncelle.form');
    // Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.kategori.guncelle');
    Route::get('/kategori/sil/{id}', 'KategoriSil')->name('kategori.sil');
});

//Alt kategori route

Route::controller(AltkategoriController::class)->group(function () {
    Route::get('/altkategori/liste', 'AltkategoriListe')->name('altkategori.liste');
    Route::get('/altkategori/ekle', 'AltkategoriEkle')->name('altkategori.ekle');
    Route::post('/altkategori/ekle/form', 'AltKategoriEkleForm')->name('altkategori.ekle.form');
    Route::get('/altkategori/duzenle/{id}', 'AltKategoriDuzenle')->name('altkategori.duzenle');
    Route::post('/alt/guncelle/form', 'AltKategoriForm')->name('alt.guncelle');
    // Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.altkategori.guncelle');
    Route::get('/altkategori/sil/{id}', 'AltKategoriSil')->name('altkategori.sil');
    Route::get('/altkategoriler/ajax/{kategori_id}', 'AltAjax');
});

//Urun route

Route::controller(UrunController::class)->group(function () {
    Route::get('/urun/liste', 'UrunListe')->name('urun.liste');
    Route::get('/urun/durum', 'UrunDurum');


    Route::get('/urun/ekle', 'UrunEkle')->name('urun.ekle');
    Route::post('/urun/ekle/form', 'UrunEkleForm')->name('urun.ekle.form');
    Route::get('/urun/duzenle/{id}', 'UrunDuzenle')->name('urun.duzenle');
    Route::post('/urun/guncelle/form', 'UrunGuncelle')->name('urun.guncelle.form');
    // Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle');
    Route::get('/urun/sil/{id}', 'UrunSil')->name('urun.sil');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Front route
Route::get('/urun/{id}/{url}', [FrontController::class, 'UrunDetay']);
Route::get('/kategori/{id}/{url}', [FrontController::class, 'KategoriDetay']);
Route::get('/altkategori/{id}/{url}', [FrontController::class, 'AltDetay']);
Route::get('/post/{id}/{url}', [FrontController::class, 'IcerikDetay']);
Route::get('/blog/{id}/{url}', [FrontController::class, 'Kategori_Detay']);
Route::get('/blog', [FrontController::class, 'BlogHepsi']);


//Blogkategori route

Route::controller(BlogKategoriController::class)->group(function () {
    Route::get('/blog/kategori/liste', 'BlogListe')->name('blog.liste');
    Route::get('/blog/kategori/ekle', 'BlogKategoriEkle')->name('blog.kategori.ekle');
    Route::post('/blog/kategori/form', 'BlogKategoriForm')->name('blog.kategori.form');
    Route::get('/blog/kategori/durum', 'UrunDurum');



    Route::get('/blog/kategori/duzenle/{id}', 'BlogKategoriDuzenle')->name('blog.kategori.duzenle');


    Route::post('/blog/kategori/guncelle/form', 'BlogKategoriGuncelle')->name('blog.kategori.guncelle');
    Route::get('/blog/kategori/sil/{id}', 'BlogKategoriSil')->name('blog.kategori.sil');

    // Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.blogkategori.guncelle');
});


//Blogicerik route

Route::controller(BlogicerikController::class)->group(function () {
    Route::get('/icerik/liste', 'IcerikListe')->name('icerik.liste');
    Route::get('/blog/icerik/durum', 'BlogicerikDurum');
    Route::get('/blog/icerik/ekle', 'BlogicerikEkle')->name('blog.icerik.ekle');

    Route::post('/blog/icerik/ekle/form', 'BlogicerikEkleForm')->name('blog.icerik.ekle.form');
    Route::get('/blog/icerik/duzenle/{id}', 'BlogIcerikDuzenle')->name('blog.icerik.duzenle');
    Route::post('/blog/icerik/guncelle/form', 'BlogicerikGuncelleForm')->name('blog.icerik.guncelle.form');
    // Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle');
    Route::get('/blog/icerik/sil/{id}', 'BlogicerikSil')->name('blog.icerik.sil');
});

//Rol ve izinler route

Route::controller(RolController::class)->group(function () {
    Route::get('/izin/liste', 'IzinListe')->name('izin.liste');
    Route::get('/blog/icerik/durum', 'BlogicerikDurum');
    Route::get('/izin/ekle', 'IzinEkle')->name('izin.ekle');

    Route::post('/izin/form', 'IzinForm')->name('izin.ekle.form');
    
    Route::get('/izin/duzenle/{id}', 'IzinDuzenle')->name('izin.duzenle');
    Route::post('/izin/guncelle', 'IzinGuncelle')->name('izin.guncelle.form');
    // Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle');
    Route::get('/izin/sil/{id}', 'IzinSil')->name('izin.sil');
});

//Roller route

Route::controller(RolController::class)->group(function () {
    Route::get('/rol/liste', 'RolListe')->name('rol.liste');
    Route::get('/blog/icerik/durum', 'BlogicerikDurum');
    Route::get('/rol/ekle', 'RolEkle')->name('rol.ekle');

    Route::post('/rol/form', 'RolForm')->name('rol.ekle.form');
    
    Route::get('/rol/duzenle/{id}', 'RolDuzenle')->name('rol.duzenle');
    Route::post('/rol/guncelle', 'RolGuncelle')->name('rol.guncelle');
    // Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle');
    Route::get('/rol/sil/{id}', 'RolSil')->name('rol.sil');

    
    //Rol izin verme

    Route::get('/rol/izin/verme', 'RolIzinVerme')->name('rol.izin.verme');
    Route::post('/rol/yetki/ver', 'RolYetkiVer')->name('yetki.ver.form');
    Route::get('/rol/yetki/liste', 'RolYetkiListe')->name('rol.yetki.liste');
    Route::get('/rol/yetki/duzenle/{id}', 'RolYetkiDuzenle')->name('rol.yetki.duzenle');
    Route::post('/rol/yetki/guncelle/{id}', 'RolYetkiGuncelle')->name('rol.yetki.guncelle');


});

// Language Switch Route
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');