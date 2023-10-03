<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeoBlockerController;
use App\Http\Controllers\PreviewsController;
use App\Http\Controllers\RedirectRuleController;
use App\Http\Controllers\IndexController;
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

Route::middleware(['msdev2.shopify.installed'])->group(function(){
    Route::get('/setting', [IndexController::class,'index'])->name('setting.index');
    Route::post('/setting', [IndexController::class,'store'])->name('setting.save');
    Route::resource('redirectrule', RedirectRuleController::class);
    Route::resource('geoblocker', GeoBlockerController::class);
    Route::resource('previews', PreviewsController::class);
});
