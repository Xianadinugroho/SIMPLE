<?php

use Illuminate\Support\Facades\Route;

// =============================================
// AUTH
// =============================================
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// =============================================
// DASHBOARD (3 ROLE)
// =============================================
Route::get('/dashboard/kurikulum', function () {
    return view('dashboard.kurikulum');
});

Route::get('/dashboard/guru', function () {
    return view('dashboard.guru');
});

Route::get('/dashboard/siswa', function () {
    return view('dashboard.siswa');
});

// =============================================
// DOKUMEN
// =============================================
Route::get('/documents/upload', function () {
    return view('documents.upload');
});

Route::get('/documents', function () {
    return view('documents.index');
});

Route::get('/documents/{id}', function ($id) {
    return view('documents.index', ['documentId' => $id]);
});

// =============================================
// VERIFIKASI (Kurikulum)
// =============================================
Route::get('/verification', function () {
    return view('documents.verification');
});

// =============================================
// QR CODE
// =============================================
Route::get('/scan', function () {
    return view('qr.scanner');
});

// Halaman publik untuk scan QR dari HP
Route::get('/doc/{id}', function ($id) {
    return view('documents.public', ['documentId' => $id]);
});

// =============================================
// MANAJEMEN USER (Kurikulum)
// =============================================
Route::get('/users', function () {
    return view('users.index');
});

// =============================================
// STATISTIK (Kurikulum)
// =============================================
Route::get('/statistics', function () {
    return view('statistics.index');
});

// =============================================
// ACTIVITY LOGS (Kurikulum)
// =============================================
Route::get('/activity-logs', function () {
    return view('activity-logs.index');
});

