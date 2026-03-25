<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/ideas');

Route::middleware('auth')->group(function () {
    Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas.index');
    Route::get('/ideas/create', [IdeaController::class,'create'])->name('ideas.create');
    Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
    Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
    Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');
    Route::patch('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
    Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

    Route::get('/user', [AuthController::class, 'index']);
    Route::delete('/user/{user}', [AuthController::class, 'delete'])->name('user.destroy');
    Route::get('/user/{user}/edit', [AuthController::class, 'edit'])->name('user.edit');
    Route::patch('/user/{user}', [AuthController::class, 'update'])->name('user.update');
    Route::get('/admin', [AdminController::class, 'indexAdmin'])->can('admin');
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'create'])->name('login');
    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'createLogin']);
    Route::post('/login', [AuthController::class, 'storeLogin']);
});

Route::get('/admin', [AdminController::class, 'indexAdmin'])->can('admin');
