<?php

use App\Livewire\Admin\Dokumen\ListDokumenDataInovasiPelayananPublik;
use App\Livewire\Admin\Dokumen\ListDokumenKelembagaanAnjab;
use App\Livewire\Admin\Dokumen\ListDokumenPeningkatanKinerjaReformasiBirokrasi;
use App\Livewire\Admin\Dokumen\ListDokumenTatalaksanaPelayananPublik;
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

Route::get('/generate', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

Route::prefix('auth')->group(function () {
    Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', App\Livewire\Auth\Register::class)->name('register');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', App\Livewire\Admin\Dashboard::class)->name('dashboard');

    Route::get('/list-buku', App\Livewire\Admin\ListBook::class)->name('list-buku');
    Route::get('/list-dokumen', App\Livewire\Admin\ListDocument::class)->name('list-dokumen');
    Route::get('/list-lemari', App\Livewire\Admin\ListCupboard::class)->name('list-lemari');

    // Route::prefix('list-buku')->group(function () {
    //     Route::get('/list-dokumen-tatalaksana', App\Livewire\Admin\Book\ListDocumentTatalaksana::class)->name('list-dokumen-tatalaksana');
    //     Route::get('/list-dokumen-pelayanan-public', App\Livewire\Admin\Book\ListDocumentPelayananPublic::class)->name('list-dokumen-pelayanan-public');
    // });

    Route::prefix('list-dokumen')->group(function () {
        Route::get('/list-dokumen-tatalaksana-pelayanan-publik', ListDokumenTatalaksanaPelayananPublik::class)->name('list-dokumen-tatalaksana-pelayanan-publik');
        Route::get('/list-dokumen-peningkatan-kinerja-reformasi-birokrasi', ListDokumenPeningkatanKinerjaReformasiBirokrasi::class)->name('list-dokumen-peningkatan-kinerja-reformasi-birokrasi');
        Route::get('/list-dokumen-kelembagaan-anjab', ListDokumenKelembagaanAnjab::class)->name('list-dokumen-kelembagaan-anjab');
        Route::get('/list-dokumen-data-inovasi-pelayanan-publik', ListDokumenDataInovasiPelayananPublik::class)->name('list-dokumen-data-inovasi-pelayanan-publik');
    });
});
