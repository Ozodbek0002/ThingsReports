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
        $user = User::create([
            'name' => 'Secret',
            'email' => 'secret@gmail.com',
            'password' => Hash::make('secret001'),
            'phone' => '912770919',
            'role_id' => 1,
            'department_id'=>1, // admin

        ]);

        $user = User::create([
            'name' => 'Umirbek', // 2
            'email' => 'umrbek@gmail.com',
            'password' => Hash::make('umrbek001'),
            'phone' => '912770919',
            'role_id' => 2,
            'department_id'=>2, // bugalteriya
        ]);

        $user = User::create([
            'name' => 'Abdullo',// 3
            'email' => 'abdullo@gmail.com',
            'password' => Hash::make('abdullo001'),
            'phone' => '912770919',
            'role_id' => 2,
            'department_id'=>3, // telekamunikatsiya t kafedra
        ]);

        $user = User::create([
            'name' => 'Sardor', // 4
            'email' => 'sardor@gmail.com',
            'password' => Hash::make('sardor001'),
            'phone' => '912770919',
            'role_id' => 2,
            'department_id'=>3, // dasturiy injenering kafedrasi
        ]);



    }
}
