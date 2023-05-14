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
            'name' => 'Fayzullo', // 2
            'email' => 'fayzulla@gmail.com',
            'password' => Hash::make('fayzulla001'),
            'phone' => '912770919',
            'role_id' => 2,
            'department_id'=>2, // bugalteriya
        ]);

        $user = User::create([
            'name' => 'Abrorbek',// 3
            'email' => 'abrorbek@gmail.com',
            'password' => Hash::make('abrorbek001'),
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
