<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Board;
use App\Livewire\Utilisateur;
use App\Http\Livewire\Dashboard;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('users', 'users')
    ->middleware(['auth', 'verified'])
    ->name('users');

Route::view('cmd', 'cmd')
    ->middleware(['auth', 'verified'])
    ->name('cmd');

Route::view('amender', 'amender')
    ->middleware(['auth', 'verified'])
    ->name('amender'); 

Route::view('validate', 'validate')
    ->middleware(['auth', 'verified'])
    ->name('validate'); 

Route::view('dismiss', 'dismiss')
    ->middleware(['auth', 'verified'])
    ->name('dismiss'); 

Route::view('card', 'card')
    ->middleware(['auth', 'verified'])
    ->name('card');
    
Route::view('people', 'people')
    ->middleware(['auth', 'verified'])
    ->name('people');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');  

require __DIR__.'/auth.php';
