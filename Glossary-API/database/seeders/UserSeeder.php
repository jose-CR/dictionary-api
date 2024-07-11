<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
        ->count(100)
        ->withRoles(['user'])
        ->create();

        User::factory()
        ->count(100)
        ->withRoles(['admin'])
        ->create();

        User::factory()
        ->count(1000)
        ->withRoles(['temp'])
        ->create();
    }
}
