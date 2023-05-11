<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{

    public function run(): void
    {
        $room = Room::create([
            'name' => '102',
            'user_id' => 2,
        ]);

        $room = Room::create([
            'name' => '103',
            'user_id' => 2,
        ]);


        $room = Room::create([
            'name' => '222',
            'user_id' => 3,
        ]);

        $room = Room::create([
            'name' => '223',
            'user_id' => 3,
        ]);

        $room = Room::create([
            'name' => '321',
            'user_id' => 4,
        ]);

        $room = Room::create([
            'name' => '322',
            'user_id' => 4,
        ]);





    }
}
