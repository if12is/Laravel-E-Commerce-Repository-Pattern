<?php

// use Illuminate\Support\Facades\Auth;
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

Route::get('/phone', function () {
    return view('phone');
})->name('phone');
Route::post('/phone/value', [\App\Http\Controllers\PhoneController::class, 'val'])->name('phone-value');
Route::middleware(['auth.admin'])->group(function () {
    // Admin routes here
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__ . '/dashboard.php';
