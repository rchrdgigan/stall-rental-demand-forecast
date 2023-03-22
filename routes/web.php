<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{HomeController,SectionController,PhaseController,TenantController};

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

Route::redirect('/', 'login');

Route::middleware('auth')->group(function () {
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::get('/section', [SectionController::class, 'index'])->name('section');
    Route::get('/phase', [PhaseController::class, 'index'])->name('phase');
    Route::get('/tenant', [TenantController::class, 'index'])->name('tenant');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
