<?php

use App\Http\Controllers\VerificationController;
use App\Http\Livewire\Verification;
use Illuminate\Support\Facades\Route;

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
})->name('landing');

Route::get('/comment-ca-marche', function () {
    return view('instructions');
})->name('instructions');

Route::get('/verification', Verification::class)->name('verification');

Route::post('/save', 'VerificationController@save')->name('save');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
