<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;   

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class); //This will create all theh routes for the PostController

