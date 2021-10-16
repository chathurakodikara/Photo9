<?php

use Illuminate\Support\Facades\Route;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

# facebook auth managmenet
Route::prefix('auth.facebook')->name('facebook.')->group(function ()
{
    Route::get('redirect', [FacebookAuthController::class, 'handleFacebookRedirect'])->name('login');
    Route::get('callback', [FacebookAuthController::class, 'handleFacebookCallback'])->name('callback');
});

