<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;   

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');
