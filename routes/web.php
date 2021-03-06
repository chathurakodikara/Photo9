<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacebookImagesController;
use App\Http\Controllers\FacebookApiErrorController;
use App\Http\Controllers\Auth\FacebookAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


# facebook auth managmenet
Route::prefix('auth/facebook')->name('facebook.')->group(function ()
{
    Route::get('redirect', [FacebookAuthController::class, 'handleFacebookRedirect'])->name('login');
    Route::get('callback', [FacebookAuthController::class, 'handleFacebookCallback'])->name('callback');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/facebook-images', [FacebookImagesController::class, 'index'])->name('facebook-images');
    Route::get('/photos', [PhotoController::class, 'index'])->name('photo.index');
    
});

