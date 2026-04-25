<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
            $table->foreignId('hotel_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->decimal('price_per_night', 8, 2);
            $table->integer('max_occupancy');
            $table->integer('available_rooms');
        */

        Room::create([
            'hotel_id'=>1,
            'name'=>'room1',
            'price_per_night'=>1000.00,
            'max_occupancy'=>1,
            'available_rooms'=>10
        ]);
        Room::create([
            'hotel_id'=>1,
            'name'=>'room20',
            'price_per_night'=>1200.00,
            'max_occupancy'=>1,
            'available_rooms'=>20
        ]);
        Room::create([
            'hotel_id'=>1,
            'name'=>'room40',
            'price_per_night'=>1400.00,
            'max_occupancy'=>1,
            'available_rooms'=>5
        ]);
    }
}
