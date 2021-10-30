<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BerkalaController;
use App\Http\Controllers\BerkalaPublicController;
use App\Http\Controllers\SetiapsaatController;
use App\Http\Controllers\SetiapsaatPublicController;
use App\Http\Controllers\SertamertaController;
use App\Http\Controllers\SertamertaPublicController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\InfografisPublicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

# [Public Index Route] 
Route::get('/', [HomeController::class, 'index'])->name('home');

# [About Route]
Route::get('/tentang', [HomeController::class, 'about'])->name('about');

# [Public Berkala Route]
Route::get('/berkala', [BerkalaPublicController::class, 'index'])->name('berkalapublic');
Route::get('berkalapublic-datatable', [BerkalaPublicController::class, 'datatable'])->name('berkalapublic.datatable');
Route::get('berkalapublic/{berkala}/download', [BerkalaPublicController::class, 'download'])->name('berkalapublic.download');

# [Public Infografis Route]
Route::get('/infografis', [InfografisPublicController::class, 'index'])->name('infografispublic');

# [Public Serta Merta Route]
Route::get('/sertamerta', [SertamertaPublicController::class, 'index'])->name('sertamertapublic');
Route::get('sertamertapublic-datatable', [SertamertaPublicController::class, 'datatable'])->name('sertamertapublic.datatable');
Route::get('sertamertapublic/{sertamerta}/download', [SertamertaPublicController::class, 'download'])->name('sertamertapublic.download');

# [Public Setiap Saat Route]
Route::get('/setiapsaat', [SetiapsaatPublicController::class, 'index'])->name('setiapsaatpublic');
Route::get('setiapsaatpublic-datatable', [SetiapsaatPublicController::class, 'datatable'])->name('setiapsaatpublic.datatable');
Route::get('setiapsaatpublic/{setiapsaat}/download', [SetiapsaatPublicController::class, 'download'])->name('setiapsaatpublic.download');

/*
|--------------------------------------------------------------------------
| Administrator Routes
|--------------------------------------------------------------------------
*/

Route::prefix('administrator')->group(function () {

    # [Dasboard Route]
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    # [Berkala Routes]
    Route::resource('berkala', BerkalaController::class);
    Route::get('berkala-datatable', [BerkalaController::class, 'datatable'])->name('berkala.datatable');
    Route::get('berkala/{berkala}/download', [BerkalaController::class, 'download'])->name('berkala.download');

    # [Setiap Saat Routes]
    Route::resource('setiapsaat', SetiapsaatController::class);
    Route::get('setiapsaat-datatable', [SetiapsaatController::class, 'datatable'])->name('setiapsaat.datatable');
    Route::get('setiapsaat/{setiapsaat}/download', [SetiapsaatController::class, 'download'])->name('setiapsaat.download');

    # [Serta Merta Routes]
    Route::resource('sertamerta', SertamertaController::class)->parameters([
        'sertamerta' => 'sertamerta'
    ]);
    Route::get('sertamerta-datatable', [SertamertaController::class, 'datatable'])->name('sertamerta.datatable');
    Route::get('sertamerta/{sertamerta}/download', [SertamertaController::class, 'download'])->name('sertamerta.download');

    # [Infografis Routes]
    Route::resource('infografis', InfografisController::class)->parameters([
        'infografis' => 'infografis'
    ]);
    Route::get('infografis-datatable', [InfografisController::class, 'datatable'])->name('infografis.datatable');
    Route::get('infografis/{infografis}/download', [InfografisController::class, 'download'])->name('infografis.download');

    # [Profil Routes]
    Route::resource('profil', UserController::class);
    Route::patch('/profil/{id}/ubah', [UserController::class, 'ubah'])->name('profil.ubah'); //ubah informasi admin
});
