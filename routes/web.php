<?php

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
//     return redirect('auth/login');
// });

Route::get('/', App\Livewire\Guest\LandingPage::class);

Route::prefix('auth')->group(function () {
    Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', App\Livewire\Auth\Register::class)->name('register');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', App\Livewire\Admin\Dashboard::class)->name('dashboard');

    Route::get('/list-buku', App\Livewire\Admin\ListBook::class)->name('list-buku');
    Route::get('/list-dokumen', App\Livewire\Admin\ListDocument::class)->name('list-dokumen');
    Route::get('/list-lemari', App\Livewire\Admin\ListCupboard::class)->name('list-lemari');
});
