<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{

    public function run(): void
    {
        $product = Product::create([
            'name' => 'Parta ',
            'count'=> 10,
            'code' => '123456',
            'image' => null,
            'category_id' => 1,
            'user_id' => 1,
            'unit_id' => 1,

        ]);

        $product = Product::create([
            'name' => 'kursi',
            'count'=> 40,
            'code' => '123456',
            'image' => null,
            'category_id' => 1,
            'user_id' => 1,
            'unit_id' => 1,

        ]);
    }
}
