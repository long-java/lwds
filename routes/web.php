<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;




// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('{path}',"app\Http\Controllers\HomeController@index") -> where('path', '([A-z\d-\/_.]+)?');


// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::view('/{any}', 'home')
//     ->where('any', '.*');

Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');



//Đa ngôn ngữ
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect() -> back();
})->name('app.setLocale');;


