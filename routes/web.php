<?php

use App\Http\Controllers\absenController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [absenController::class, 'index'])->name('home');
Route::post('/store', [absenController::class, 'store'])->name('store');
Route::get('/rekap', [absenController::class, 'rekap'])->name('rekap.index');

// Route::get('/show-qr/{id}', function ($id) {
//     return view('show-qr', ['id' => $id]);
// });
