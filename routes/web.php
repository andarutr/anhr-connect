<?php

use App\Livewire\Auth\Login;
use App\Livewire\Candidate\PostApply;
use App\Livewire\Candidate\TrackApply;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/apply');
Route::get('/login', Login::class);
Route::get('/apply', PostApply::class);
Route::get('/track-apply', TrackApply::class);
Route::view('/success-apply', 'success-apply');
