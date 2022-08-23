<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PagesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::get('/pages', [PagesController::class, 'index']);
    Route::get('/pages/{page}', [PagesController::class, 'show']);
    Route::post('/pages/{page}/add-view', [PagesController::class, 'addView']);
});
