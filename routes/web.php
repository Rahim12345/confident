<?php

use App\Http\Controllers\EmeliyyatNovuController;
use App\Http\Controllers\HekimController;
use App\Http\Controllers\HekimVezifeController;
use App\Http\Controllers\IsciController;
use App\Http\Controllers\IstehsalciController;
use App\Http\Controllers\KateqoriyaController;
use App\Http\Controllers\KlinikaController;
use App\Http\Controllers\MagazaController;
use App\Http\Controllers\MarkaController;
use App\Http\Controllers\MehsulController;
use App\Http\Controllers\PartnyorController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\Satici\SaticiMehsullar;
use App\Http\Controllers\SatisController;
use App\Http\Controllers\SeherController;
use App\Http\Controllers\VahidController;
use App\Http\Controllers\VezifeController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

Route::get('langs/{locale}',[App\Http\Controllers\profileController::class,'langSwitcher'])
        ->name('lang.swithcher');

Route::get('mode/{theme}',[App\Http\Controllers\profileController::class,'modeSwitcher'])
    ->name('mode.swithcher');

Route::get('/',[App\Http\Controllers\sign\sign_in_upController::class,'login'])
    ->middleware('locale')
    ->name('login');

Route::post('daxil-ol',[App\Http\Controllers\sign\sign_in_upController::class,'loginPost'])
    ->middleware('locale')
    ->middleware('throttle:5,60')
    ->name('login.post');

Route::get('cixis-et',[App\Http\Controllers\sign\sign_in_upController::class,'logout'])
    ->middleware( 'auth' )
    ->name( 'logout' );

Route::post('avatar-upload',[ App\Http\Controllers\profileController::class,'avatarUpload' ])
    ->name('front.avatar.upload')
    ->middleware('auth');

Route::post('profile',[ App\Http\Controllers\profileController::class,'profileUpdate' ])
    ->name('front.profile.update')
    ->middleware('auth');

Route::group(['prefix'=>'admin','middleware'=>['auth', 'locale']],function (){

    Route::get('/',[App\Http\Controllers\AdminController::class,'index'])
        ->name('back.dashboard');
    Route::get('profile',[App\Http\Controllers\profileController::class,'profile'])
        ->name('back.profile');

    Route::resource('option',App\Http\Controllers\OptionController::class);

    Route::resource('magaza', MagazaController::class);
    Route::resource('vezife', VezifeController::class);
    Route::resource('hvezife', HekimVezifeController::class);
    Route::resource('seher', SeherController::class);
    Route::resource('rayon', RayonController::class);
    Route::resource('klinika', KlinikaController::class);
    Route::resource('hekim', HekimController::class);
    Route::resource('isci', IsciController::class);
    Route::resource('partnyor', PartnyorController::class);
    Route::resource('istehsalci', IstehsalciController::class);
    Route::resource('kateqoriya', KateqoriyaController::class);
    Route::resource('model', MarkaController::class);
    Route::resource('vahid', VahidController::class);
    Route::resource('operation', EmeliyyatNovuController::class);
    Route::resource('mehsul', MehsulController::class);
});


Route::group(['prefix'=>'satici','middleware'=>['auth', 'locale']],function (){
    Route::get('mehsul', [SaticiMehsullar::class,'index'])
        ->name('satici.mehsullar');

    Route::resource('sell',SatisController::class);
    Route::get('satis-et/{usul}',[SatisController::class,'satisEt'])
        ->name('satici.satis');

    Route::post('customers',[SatisController::class,'getCustomers'])
        ->name('satis.customers');

    Route::post('firmas',[SatisController::class,'getFirmas'])
        ->name('satis.firmas');

    Route::post('istehsalcis',[SatisController::class,'getIstehsalcis'])
        ->name('satis.istehsalcis');

    Route::post('mehsuls',[SatisController::class,'getMehsuls'])
        ->name('satis.mehsuls');

    Route::post('sebete-at',[SatisController::class,'sebeteAt'])
        ->name('satis.sebete.at');

    Route::post('sebeti-cagir',[SatisController::class,'sebetiCagir'])
        ->name('satis.sebeti.cagir');

    Route::post('product-removal', [SatisController::class,'productRemoval'])
        ->name('front.product.removal');


});

Route::get('test', function (){
    dd(unserialize(Cookie::get('sebet')));
});
