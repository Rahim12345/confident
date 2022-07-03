<?php

use App\Http\Controllers\HekimController;
use App\Http\Controllers\IsciController;
use App\Http\Controllers\KlinikaController;
use App\Http\Controllers\MagazaController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\SeherController;
use App\Http\Controllers\VezifeController;
use Illuminate\Support\Facades\Route;

Route::get('langs/{locale}',[App\Http\Controllers\profileController::class,'langSwitcher'])
        ->name('lang.swithcher');

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
    Route::resource('seher', SeherController::class);
    Route::resource('rayon', RayonController::class);
    Route::resource('klinika', KlinikaController::class);
    Route::resource('hekim', HekimController::class);
    Route::resource('isci', IsciController::class);
});
