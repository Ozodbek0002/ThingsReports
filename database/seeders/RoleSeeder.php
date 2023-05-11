<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rool = Role::create([
            'name' => 'Bo`lim boshlig`i',
        ]);

        $rool = Role::create([
            'name' => 'Kabinet mudiri',
        ]);
    }
}
