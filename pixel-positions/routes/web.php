<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;


Route::get('/', [JobController::class, 'index']);

