<?php

use App\Http\Controllers\HpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HpController::class, 'index']); 
Route::get('/hp/tambah', function () {
    return view('tambah');
});
Route::resource('hp',HpController::class);