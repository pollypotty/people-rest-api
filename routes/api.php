<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/people/{email}', [PersonController::class, 'show']);

Route::post('/people', [PersonController::class,'store']);

Route::delete('/people/{email}', [PersonController::class,'destroy']);
