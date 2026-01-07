<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = Hash::make('test1234');

        User::create([
            'name' => 'Lamens',
            'email' => 'lamens@domain.test',
            'password' => $password,
            'is_admin' => 1
        ]);
        
        User::create([
            'name' => 'Maguire',
            'email' => 'maguire@domain.test',
            'password' => $password,
            'is_admin' => 2
        ]);

        User::create([
            'name' => 'Shaw',
            'email' => 'shaw@domain.test',
            'password' => $password,
            'is_admin' => 2
        ]);
        
        User::create([
            'name' => 'Sesko',
            'email' => 'sesko@domain.test',
            'password' => $password,
            'is_admin' => 2
        ]);
    }
}
