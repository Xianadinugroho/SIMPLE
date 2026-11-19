<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;

// =============================================
// PUBLIC ROUTES
// =============================================
Route::post('/login', [AuthController::class, 'login']);

// ========== PUBLIC DOKUMEN (untuk scan QR dari HP) ==========
Route::get('/public/documents/{id}', [DocumentController::class, 'publicShow']);

// =============================================
// PROTECTED ROUTES (Butuh Login)
// =============================================
Route::middleware('auth:sanctum')->group(function () {

    // ========== AUTH ==========
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // ========== DOKUMEN ==========
    Route::get('/documents', [DocumentController::class, 'index']);
    Route::post('/documents/upload', [DocumentController::class, 'upload']);
    Route::get('/documents/pending', [DocumentController::class, 'pending']);
    Route::get('/documents/{id}', [DocumentController::class, 'show']);
    Route::get('/documents/{id}/download', [DocumentController::class, 'download']);
    Route::post('/documents/{id}/verify', [DocumentController::class, 'verify']);
    Route::delete('/documents/{id}', [DocumentController::class, 'destroy']);

    // ========== VERIFIKASI STATS ==========
    Route::get('/verification/stats', [DocumentController::class, 'verificationStats']);

    // ========== QR CODE ==========
    Route::post('/documents/scan', [DocumentController::class, 'scanQR']);

    // ========== SISWA ==========
    Route::get('/students', [DocumentController::class, 'students']);

    // ========== STATISTIK ==========
    Route::get('/statistics', [DocumentController::class, 'statistics']);

    // ========== EXPORT EXCEL (BARU) ==========
    Route::get('/export/documents', [DocumentController::class, 'exportExcel']);

    // ========== ACTIVITY LOGS (BARU) ==========
    Route::get('/activity-logs', [DocumentController::class, 'activityLogs']);

    // ========== MANAJEMEN USER (Kurikulum) ==========
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);


});