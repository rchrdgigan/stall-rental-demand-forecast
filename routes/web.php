<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    HomeController,
    SectionController,
    PhaseController,
    TenantController,
    PaymentController,
    ReportController,
    ProfileController
};

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

    Route::controller(SectionController::class)
    ->as('section.')
    ->prefix('section')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy', 'destroy')->name('destroy');
    });

    Route::controller(PhaseController::class)
    ->as('phase.')
    ->prefix('phase')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy', 'destroy')->name('destroy');
    });

    Route::get('/tenant', [TenantController::class, 'index'])->name('tenant');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
