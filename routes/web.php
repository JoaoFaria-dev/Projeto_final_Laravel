<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));

Route::get('/register', [AuthController::class, 'create' ]);
Route::post('/register', [AuthController::class, 'store']);


Route::get('/login', [AuthController::class, 'createLogin']);
Route::post('/login', [AuthController::class, 'storeLogin']);

