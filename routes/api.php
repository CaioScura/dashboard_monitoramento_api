<?php

use Illuminate\Http\Request;
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

use App\Http\Controllers\ApiMonitorController;

Route::get('/apis', [ApiMonitorController::class, 'index']);
Route::post('/apis', [ApiMonitorController::class, 'store']);
Route::delete('/apis/{id}', [ApiMonitorController::class, 'destroy']);
Route::get('/apis/check', [ApiMonitorController::class, 'checkApis']);

