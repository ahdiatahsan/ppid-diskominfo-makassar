<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BerkalaController;
use App\Http\Controllers\SetiapsaatController;
use App\Http\Controllers\SertamertaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InfografisController;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


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
