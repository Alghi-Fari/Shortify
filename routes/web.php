<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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
    Route::get('/home',[DashboardController::class, 'index'])->name('home');
    Route::group(['middleware' => 'auth', 'as' => 'app.'], function () {
        Route::resource('links', LinkController::class)->names('link');
    });
});

require 'auth.php';

//Digunakan untuk mengarahkan lansung ke dashboard bila link nya /
// Route::get('/',function(){
//     return view('backend/dashboard/index');
// });

//Digunakan sementara untuk masuk ke login
// Route::get('/', function(){
//     return view('auth/login');
// });

Route::get('/', function () {
    return view('backend.dashboard.index', [
        'title' => 'Home',
    ]);
});

Route::post('/link/guest', [LinkController::class, 'guest'])->name('app.link.guest.store');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LogoutController::class, '__invoke'])->name('logout');
Route::get('/home', [DashboardController::class, 'index'])->name('home');

//Digunakan Untuk Redirect Shortlink ke Original Link
Route::get('/{link}', function (string $link) {
    $link = Link::where('shorted_link', $link)->get()->first();
    return redirect()->away($link->original_link);
});