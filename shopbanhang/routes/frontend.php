<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Route::get('/','FrontendController@index')->name('home');
// Route::get('/home', function () {
//     return view('frontend.index');
// })->name('home');
// Route::prefix('client')->group(function(){
    Route::get('/home',[FrontendController::class,'index'])->name('home.index');
// })
?>
