<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Cursos de la Academia 1
        Course::create([
            'academy_id' => 1,
            'name' => 'API REST Profesional con Laravel',
            'description' => 'Aprende a construir APIs seguras, escalables y bien documentadas.',
            'start_date' => '2026-12-01',
            'end_date' => '2027-02-28',
            'capacity' => 25,
        ]);

        Course::create([
            'academy_id' => 1,
            'name' => 'Bases de Datos Relacionales y SQL',
            'description' => 'Diseño de esquemas, optimización de consultas e índices.',
            'start_date' => '2027-01-15',
            'end_date' => '2027-03-30',
            'capacity' => 20,
        ]);

        // Curso de la Academia 2
        Course::create([
            'academy_id' => 2,
            'name' => 'Desarrollo Frontend con Vue y TypeScript',
            'description' => 'Consumo de APIs REST y creación de interfaces reactivas.',
            'start_date' => '2026-12-10',
            'end_date' => '2027-04-15',
            'capacity' => 30,
        ]);
    }
}