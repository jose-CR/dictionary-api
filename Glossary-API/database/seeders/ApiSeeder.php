<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
        ->count(5)
        ->has(subCategory::factory(5)
        ->haswords(10))
        ->create();
    }
}
