<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return redirect('patients');
});

Route::get('/patients', [PatientsController::class, 'index'])->name('patients');

Route::post('/patients/upload', [PatientsController::class, 'store'])->name('patients.upload');

Route::post('/patients/verify', [PatientsController::class, 'verify'])->name('patients.verify');