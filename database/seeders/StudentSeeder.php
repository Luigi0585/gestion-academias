<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $student1 = Student::create([
            'name' => 'Laura',
            'surname' => 'Martínez',
            'email' => 'laura.martinez@example.com',
            'phone' => '611223344',
            'date_of_birth' => '1999-04-18',
        ]);

        $student2 = Student::create([
            'name' => 'Javier',
            'surname' => 'Sánchez',
            'email' => 'javier.sanchez@example.com',
            'phone' => '622334455',
            'date_of_birth' => '2001-09-22',
        ]);

        $student3 = Student::create([
            'name' => 'Sofía',
            'surname' => 'Navarro',
            'email' => 'sofia.navarro@example.com',
            'phone' => '633445566',
            'date_of_birth' => '1997-11-05',
        ]);

        // Matricular estudiantes en cursos (Tabla pivote course_student)
        $student1->courses()->attach([
            1 => ['enrolled_at' => now()],
            2 => ['enrolled_at' => now()],
        ]);

        $student2->courses()->attach([
            1 => ['enrolled_at' => now()],
        ]);

        $student3->courses()->attach([
            3 => ['enrolled_at' => now()],
        ]);
    }
}