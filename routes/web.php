<?php

use App\Http\Controllers\LiveDisplayController;
use Illuminate\Support\Facades\Route;

Route::get('/', LiveDisplayController::class)->name('live.display');
