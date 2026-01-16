<?php

use App\Livewire\Hrd\Mcu;
use App\Livewire\Hrd\Apply;
use App\Livewire\Hrd\Hired;
use App\Livewire\Auth\Login;
use App\Livewire\Hrd\JobList;
use App\Livewire\Hrd\JobPost;
use App\Livewire\Hrd\Employee;
use App\Livewire\Hrd\Rejected;
use App\Livewire\Hrd\Dashboard;
use App\Livewire\Hrd\Psikotest;
use App\Livewire\Hrd\Screening;
use App\Livewire\Hrd\OnBoarding;
use App\Livewire\Admin\ManageUser;
use App\Livewire\Hrd\InterviewHrd;
use App\Livewire\Candidate\ListJob;
use App\Livewire\Hrd\InterviewUser;
use App\Livewire\Hrd\TechnicalTest;
use App\Livewire\Candidate\PostApply;
use Illuminate\Support\Facades\Route;
use App\Livewire\Candidate\TrackApply;
use App\Livewire\Admin\ManageCompanyMcu;
use App\Livewire\Admin\ManageUserInterview;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Employee\Resign;
use App\Livewire\Hrd\ApprovalResign;
use App\Livewire\Hrd\NoticePeriodResign;

Route::get('/', ListJob::class);
Route::get('/login', Login::class)->name('login');
Route::get('/apply', PostApply::class);
Route::get('/resign', Resign::class);
Route::get('/track-apply', TrackApply::class);
Route::view('/success-apply/{no_apply}', 'success-apply');

Route::middleware('auth')->group(function(){
    Route::prefix('/hrd')->group(function(){
        Route::get('/', Dashboard::class);
        Route::get('/job-listing', JobList::class);
        Route::get('/job-posting', JobPost::class);
        Route::get('/employee', Employee::class);
        Route::prefix('/candidate')->group(function(){
            Route::get('/apply', Apply::class);
            Route::get('/screening', Screening::class);
            Route::get('/hr', InterviewHrd::class);
            Route::get('/user', InterviewUser::class);
            Route::get('/psikotest', Psikotest::class);
            Route::get('/technical-test', TechnicalTest::class);
            Route::get('/mcu', Mcu::class);
            Route::get('/on-boarding', OnBoarding::class);
            Route::get('/hired', Hired::class);
            Route::get('/rejected', Rejected::class);
        });

        Route::prefix('/resign')->group(function(){
            Route::get('/approval', ApprovalResign::class);
            Route::get('/notice', NoticePeriodResign::class);
        });
    });

    Route::prefix('/admin')->group(function(){
        Route::get('/', AdminDashboard::class);
        Route::get('/manage-users', ManageUser::class);
        Route::get('/manage-company-mcu', ManageCompanyMcu::class);
        Route::get('/manage-interview-user', ManageUserInterview::class);
    });
});