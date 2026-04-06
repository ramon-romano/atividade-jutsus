<?php

use App\Http\Controllers\JutsuController;

Route::post('/jutsu', [JutsuController::class, 'identificar']);