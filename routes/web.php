<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    Auth::guard('web')->logout();
//
//});

Route::prefix('api')->group(function () {
    Route::get('game/play', [\App\Http\Controllers\GameController::class, 'play']);
    Route::get('game/history', [\App\Http\Controllers\GameController::class, 'history']);
})->middleware('auth');

Route::prefix('/pages')->name('page.')->group(function () {
    Route::get('{link}', [\App\Http\Controllers\PageController::class, 'show'])->name('show');
    Route::post('link/generate', [\App\Http\Controllers\PageController::class, 'generateNewLink'])->name('generate.link');
    Route::post('{link}/disable', [\App\Http\Controllers\PageController::class, 'disableLink'])->name('disable');
    Route::get('link/new', [\App\Http\Controllers\PageController::class, 'showGenerateLink'])->name('show.generate.link');
});

require __DIR__.'/auth.php';
