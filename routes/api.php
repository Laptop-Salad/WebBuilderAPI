<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\CheckLogin::class, 'login']);

Route::middleware(['auth:sanctum'])->group( function () {
    Route::get('projects', [\App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
    Route::post('projects/create', [\App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
});

