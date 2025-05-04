<?php

use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

// CRUD Resident
Route::get('/resident', [ResidentController::class, 'index']); // tampil data
Route::get('/resident/create', [ResidentController::class, 'create']); // form tambah
Route::post('/resident', [ResidentController::class, 'store']); // simpan data

Route::get('/resident/{id}', [ResidentController::class, 'edit'])->name('edit.resident'); // 🔧 FORM EDIT
Route::put('/resident/{id}', [ResidentController::class, 'update'])->name('update.resident'); // 🔄 UPDATE DATA
Route::delete('/resident/{id}', [ResidentController::class, 'destroy'])->name('delete.resident'); // hapus
