<?php

use App\Models\Link;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\DashboardController;

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


Route::middleware('auth')->group(function () {
    Route::get('home', [DashboardController::class, 'index'])->name('home');
    Route::group(['middleware' => 'auth', 'as' => 'app.'], function () {
        Route::resource('links', LinkController::class)->names('link');
    });
});

Route::get('/{link}', function (string $link) {
    $link = Link::where('shorted_link', $link)->get()->first();
    return redirect()->away($link->original_link);
});

require 'auth.php';
