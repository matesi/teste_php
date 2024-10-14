<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return redirect('patients');
});

Route::get('/patients', [PatientsController::class, 'index']);

Route::post('/patients/upload', [PatientsController::class, 'store']);

Route::post('/patients/verify', [PatientsController::class, 'verify']);