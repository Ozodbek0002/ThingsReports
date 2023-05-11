<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $department = Department::create([
            'name' => 'Bugalteriya',
        ]);

        $department = Department::create([
            'name' => 'Telekamunikatsiya t kafedra',
        ]);

        $department = Department::create([
            'name' => 'Dasturiy injenering kafedrasi',
        ]);

         $department = Department::create([
            'name' => 'Barcha bo`limlar',
        ]);


    }
}
