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
            'name' => 'stul',
            'code' => '123456',
            'image' => null,
            'amount'=> 1,
            'room_id' => 1,
            'category_id' => 1,
            'unit_id' => 1,
        ]);

        $product = Product::create([
            'name' => 'stul',
            'code' => '123456',
            'image' => null,
            'amount'=> 1,
            'room_id' => 1,
            'category_id' => 1,
            'unit_id' => 1,
        ]);


    }
}
