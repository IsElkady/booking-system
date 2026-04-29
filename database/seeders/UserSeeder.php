<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->Delete();
        DB::statement("Alter table users Auto_increment=1");
        User::create([
            "name"=>"admin",
            "email"=>"admin@domain.com",
            "password"=>bcrypt("password")
        ]);
    }
}
