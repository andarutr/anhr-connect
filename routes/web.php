<?php

use App\Livewire\Candidate\PostApply;
use App\Livewire\Candidate\TrackApply;
use Illuminate\Support\Facades\Route;

Route::get('/', PostApply::class);
Route::get('/track-apply', TrackApply::class);
Route::view('/success-apply', 'success-apply');
