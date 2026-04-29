<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        Room::query()->Delete();
        DB::statement("Alter table rooms Auto_increment=1");
        $hotels=Hotel::all();
        foreach($hotels as $hotel) {
            Room::create([
                'hotel_id' => $hotel->id,
                'name' => 'Deluxe Room',
                'price_per_night' => rand(80, 150),
                'max_occupancy' => 2,
                'available_rooms' => rand(1,5)
            ]);
            Room::create([
                'hotel_id' => $hotel->id,
                'name' => 'Standard Room',
                'price_per_night' => rand(50, 100),
                'max_occupancy' => 2,
                'available_rooms' => rand(1,5)
            ]);
            Room::create([
                'hotel_id' => $hotel->id,
                'name' => 'Family Room',
                'price_per_night' => rand(120, 200),
                'max_occupancy' => 4,
                'available_rooms' => rand(1,3)
            ]);
        }
    }
}
