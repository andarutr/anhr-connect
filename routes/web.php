<?php

use App\Livewire\Auth\Login;
use App\Livewire\Candidate\PostApply;
use App\Livewire\Candidate\TrackApply;
use App\Livewire\Hrd\Dashboard;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/apply');
Route::get('/login', Login::class)->name('login');
Route::get('/apply', PostApply::class);
Route::get('/track-apply', TrackApply::class);
Route::view('/success-apply', 'success-apply');

Route::get('/hrd', Dashboard::class);