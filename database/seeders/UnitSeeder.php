<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{

    public function run(): void
    {
        $unit = Unit::create([
            'name' => 'dona',
        ]);

        $unit = Unit::create([
            'name' => 'kvadrat metr',
        ]);


    }
}
