<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void {
        DB::table('users')->truncate();  // Optativo: vacía la tabla antes de rellenarla
        DB::table('users')->insert([
            'name' => 'Luigi González Trujillo',
            'address' => 'Ñ 67, Almería',
            'email' => 'luigi@gmail.com', 
            'password' => '12345678',
        ]);
        DB::table('users')->insert([
            'name' => 'Ollijurt Zeláznog Siul',
            'address' => 'Ñ 76, Aíremla',
            'email' => 'igiul@gmail.com', 
            'password' => '87654321',
        ]);        
    }
}
