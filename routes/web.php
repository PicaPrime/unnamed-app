<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [\App\Http\Controllers\AccountController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/index', function () {
    return view('pages.index');
})->name('index');

Route::view('/', 'pages.index')->name('home');
Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user');

// has some kind of inconsistency in menu bar
Route::view('/withdraw-request', 'pages.withdraw-request')->name('withdraw-request');

Route::get('/faq', [\App\Http\Controllers\FaqController::class, 'index'])->name('faq');

Route::get('/game', [\App\Http\Controllers\GameController::class, 'index'])->name('game');
Route::get('/support', [\App\Http\Controllers\SupportController::class, 'index'])->name('support');

// terms.html page was empty
Route::view('/terms', 'pages.terms')->name('terms');


// auth related 

Route::view('/login', 'pages.login')->name('login');
Route::view('/logout', 'pages.logout')->name('logout');
Route::view('/register', 'pages.register')->name('register');
Route::view('/forget-password', 'pages.forget-password')->name('forget-password');

// account controller 

Route::get('/account', [\App\Http\Controllers\AccountController::class, 'index'])->name('account');
Route::get('/faucet', [\App\Http\Controllers\AccountController::class, 'faucet'])->name('faucet');
Route::get('/investment', [\App\Http\Controllers\AccountController::class, 'investment'])->name('investment');
Route::get('/security', [\App\Http\Controllers\AccountController::class, 'security'])->name('security');
Route::get('/transfer', [\App\Http\Controllers\AccountController::class, 'transfer'])->name('transfer');
Route::get('/leaderboard', [\App\Http\Controllers\AccountController::class, 'leaderboard'])->name('leaderboard');


route::get('/play-loto', function () {
    return view('game.index');
})->name('game');

require __DIR__ . '/auth.php';
