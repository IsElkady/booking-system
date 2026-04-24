<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::query()->Delete();
        DB::statement("Alter table hotels Auto_increment=1");
       /*
        *   $table->string('name');
            $table->string('city');
            $table->string('country');
            $table->tinyInteger('rating');
        */

        Hotel::create([
            "name"=>"De Paris Hotel",
            "city"=>"Albanien",
            "country"=>"Albania",
            "rating"=>4
        ]);
        Hotel::create([
            "name"=>"Hotel Green",
            "city"=>"Albanien",
            "country"=>"Albania",
            "rating"=>4
        ]);
        Hotel::create([
            "name"=>"Theranda Hotel",
            "city"=>"Albanien",
            "country"=>"Albania",
            "rating"=>3
        ]);
        Hotel::create([
            "name"=>"Viktoria",
            "city"=>"Albanien",
            "country"=>"Albania",
            "rating"=>3
        ]);
        Hotel::create([
            "name"=>"Hotel Relax",
            "city"=>"Albanien",
            "country"=>"Albania",
            "rating"=>5
        ]);

    }
}
