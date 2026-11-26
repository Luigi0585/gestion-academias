<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Luigi González Trujillo',
                'email' => 'luigi@gmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ollijurt Zeláznog Siul',
                'email' => 'igiul@gmail.com',
                'password' => Hash::make('87654321'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
