<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('front.home');


Route::get('langs/{locale}',[App\Http\Controllers\profileController::class,'langSwitcher'])
        ->name('lang.swithcher');

Route::get('daxil-ol',[App\Http\Controllers\sign\sign_in_upController::class,'login'])
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

});
            