<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        $category = Category::create([
            'name' => 'Stul',
        ]);

        $category = Category::create([
            'name' => 'Stol',
        ]);

        $category = Category::create([
            'name' => 'Kamera',
        ]);

        $category = Category::create([
            'name' => 'Kampyuter',
        ]);


    }
}
