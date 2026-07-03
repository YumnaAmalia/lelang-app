<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\PelaksanaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AuthController;


Route::get('/', fn() => redirect('/login'));
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {

    // dashboard
    Route::get('/dashboard', [CaseController::class, 'dashboard']);

    // CRUD cases
    Route::resource('cases', CaseController::class);

    // relasi
    Route::post('/operator', [OperatorController::class,'store']);
    Route::put('/operator/{id}', [OperatorController::class,'update']);
    Route::delete('/operator/{id}', [OperatorController::class,'destroy']);
 
    Route::post('/barang', [BarangController::class,'store']);
    Route::put('/barang/{id}', [BarangController::class,'update']);
    Route::delete('/barang/{id}', [BarangController::class,'destroy']);
    
    Route::put('/pejabat/{id}', [PejabatController::class,'update']);
    Route::post('/pejabat', [PejabatController::class,'store']);
    Route::delete('/pejabat/{id}', [PejabatController::class,'destroy']);
    
    Route::post('/pelaksana', [PelaksanaController::class,'store']);
    Route::put('/pelaksana/{id}', [PelaksanaController::class,'update']);
    Route::delete('/pelaksana/{id}', [PelaksanaController::class,'destroy']);

    // surat
    Route::get('/permohonan/{id}', [SuratController::class,'permohonan']);
    Route::get('/permohonan/pdf/{id}', [SuratController::class,'pdfPermohonan']);

    Route::get('/barang/{id}', [SuratController::class, 'barang']);
    Route::get('/barang/pdf/{id}', [SuratController::class, 'pdfBarang']);

    Route::get('/pernyataan/{id}', [SuratController::class, 'sptjm']);
    Route::get('/pernyataan/pdf/{id}', [SuratController::class, 'pdfSptjm']);

    Route::get('/keterangan/{id}', [SuratController::class, 'sisaTagihan']);
    Route::get('/keterangan/pdf/{id}', [SuratController::class, 'pdfsisaTagihan']);

    Route::get('/keputusan/{id}', [SuratController::class, 'penetapan']);
    Route::get('/keputusan/pdf/{id}', [SuratController::class, 'pdfPenetapan']);

    Route::get('/sprint/{id}', [SuratController::class, 'sprintPelaksana']);
    Route::get('/sprint/pdf/{id}', [SuratController::class, 'pdfSprintPelaksana']);

    // QR
    Route::get('/verify/{id}/{jenis}', [SuratController::class,'verify']);

    });