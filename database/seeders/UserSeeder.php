<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dev = User::create([
            'name' => 'Developer',
            'username' => 'dev',
            'email' => 'apichat_pep@hotmail.com',
            'password' => Hash::make('password'),
        ]);
        $dev->assignRole('developer');

        $superadmin = User::create([
            'name' => 'Super Administrator',
            'username' => 'superadmin',
            'email' => 'superadmin@budget.com',
            'password' => Hash::make('password'),
        ]);
        $superadmin->assignRole('super-admin');
    }
}
