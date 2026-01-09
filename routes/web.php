<?php

use App\Livewire\Auth\Login;
use App\Livewire\Candidate\PostApply;
use App\Livewire\Candidate\TrackApply;
use App\Livewire\Hrd\Apply;
use App\Livewire\Hrd\Dashboard;
use App\Livewire\Hrd\InterviewHrd;
use App\Livewire\Hrd\Screening;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/apply');
Route::get('/login', Login::class)->name('login');
Route::get('/apply', PostApply::class);
Route::get('/track-apply', TrackApply::class);
Route::view('/success-apply/{no_apply}', 'success-apply');

Route::middleware('auth')->group(function(){
    Route::get('/hrd', Dashboard::class);
    Route::get('/hrd/candidate/apply', Apply::class);
    Route::get('/hrd/candidate/screening', Screening::class);
    Route::get('/hrd/candidate/hr', InterviewHrd::class);
});