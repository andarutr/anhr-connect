<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\MasterUser;
use App\Models\MasterCompany;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Dashboard extends Component
{
    public $totalUsers = 0;
    public $totalCompanies = 0;
    public $totalInterviews = 0;

    public $latestUsers = [];
    public $latestCompanies = [];
    public $latestInterviews = [];

    public function mount()
    {
        $this->totalUsers = User::count();
        $this->totalCompanies = MasterCompany::count();
        $this->totalInterviews = MasterUser::count();

        $this->latestUsers = User::latest()->limit(5)->get();
        $this->latestCompanies = MasterCompany::latest()->limit(5)->get();
        $this->latestInterviews = MasterUser::latest()->limit(5)->get();
    }
    
    #[Layout('components.layouts.app')]
    #[Title('Selamat Datang Admin')]
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
