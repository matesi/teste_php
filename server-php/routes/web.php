<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/patients', [PatientsController::class, 'index']);

Route::post('/patients/store', [PatientsController::class, 'store']);