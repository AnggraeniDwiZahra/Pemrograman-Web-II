<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfileController::class, 'home'])->name('home');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/detail/{number}', [ProfileController::class, 'detail'])->name('detail');
Route::get('/experience', [ProfileController::class, 'experience'])->name('experience');