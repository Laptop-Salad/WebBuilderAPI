<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Landing::class)->name('landing');
Route::get('/register', \App\Livewire\Register::class)->name('register');
Route::get('/login', \App\Livewire\Login::class)->name('login');

Route::get('/dashboard', \App\Livewire\Dashboard::class)
    ->middleware('auth')
    ->name('dashboard');

Route::get('/project/{project}', \App\Livewire\Project\ShowProject::class)
    ->middleware('auth')
    ->name('project');
