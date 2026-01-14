<?php

use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\ManageCompanyMcu;
use App\Livewire\Admin\ManageUser;
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
    Route::prefix('/hrd')->group(function(){
        Route::get('/', Dashboard::class);
        Route::get('/job-posting', JobPost::class);
        Route::get('/candidate/apply', Apply::class);
        Route::get('/candidate/screening', Screening::class);
        Route::get('/candidate/hr', InterviewHrd::class);
        Route::get('/candidate/user', InterviewUser::class);
        Route::get('/candidate/psikotest', Psikotest::class);
        Route::get('/candidate/technical-test', TechnicalTest::class);
        Route::get('/candidate/mcu', Mcu::class);
        Route::get('/candidate/on-boarding', OnBoarding::class);
        Route::get('/candidate/hired', Hired::class);
        Route::get('/candidate/rejected', Rejected::class);
    });

    Route::prefix('/admin')->group(function(){
        Route::get('/', AdminDashboard::class);
        Route::get('/manage-users', ManageUser::class);
        Route::get('/manage-company-mcu', ManageCompanyMcu::class);
    });
});