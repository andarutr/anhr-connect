<?php

use App\Livewire\Auth\Login;
use App\Livewire\Candidate\ListJob;
use App\Livewire\Candidate\PostApply;
use App\Livewire\Candidate\TrackApply;
use App\Livewire\Hrd\Apply;
use App\Livewire\Hrd\Dashboard;
use App\Livewire\Hrd\Hired;
use App\Livewire\Hrd\InterviewHrd;
use App\Livewire\Hrd\InterviewUser;
use App\Livewire\Hrd\JobPost;
use App\Livewire\Hrd\Mcu;
use App\Livewire\Hrd\OnBoarding;
use App\Livewire\Hrd\Psikotest;
use App\Livewire\Hrd\Rejected;
use App\Livewire\Hrd\Screening;
use App\Livewire\Hrd\TechnicalTest;
use Illuminate\Support\Facades\Route;

Route::get('/', ListJob::class);
Route::get('/login', Login::class)->name('login');
Route::get('/apply', PostApply::class);
Route::get('/track-apply', TrackApply::class);
Route::view('/success-apply/{no_apply}', 'success-apply');

Route::middleware('auth')->group(function(){
    Route::get('/hrd', Dashboard::class);
    Route::get('/hrd/job-posting', JobPost::class);
    Route::get('/hrd/candidate/apply', Apply::class);
    Route::get('/hrd/candidate/screening', Screening::class);
    Route::get('/hrd/candidate/hr', InterviewHrd::class);
    Route::get('/hrd/candidate/user', InterviewUser::class);
    Route::get('/hrd/candidate/psikotest', Psikotest::class);
    Route::get('/hrd/candidate/technical-test', TechnicalTest::class);
    Route::get('/hrd/candidate/mcu', Mcu::class);
    Route::get('/hrd/candidate/on-boarding', OnBoarding::class);
    Route::get('/hrd/candidate/hired', Hired::class);
    Route::get('/hrd/candidate/rejected', Rejected::class);
});