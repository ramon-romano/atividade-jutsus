<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JutsuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jutsu', [JutsuController::class, 'form']);
