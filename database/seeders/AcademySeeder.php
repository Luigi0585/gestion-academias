<?php

namespace Database\Seeders;

use App\Models\Academy;
use Illuminate\Database\Seeder;

class AcademySeeder extends Seeder
{
    public function run(): void
    {
        // Asociada al usuario 1 (Carlos)
        Academy::create([
            'user_id' => 1,
            'name' => 'Academia Código Sur',
            'description' => 'Especialistas en desarrollo web, backend y APIs REST.',
            'address' => 'Paseo de Almería 45, Almería',
            'phone' => '950123456',
            'email' => 'contacto@codigosur.com',
        ]);

        // Asociada al usuario 2 (Elena)
        Academy::create([
            'user_id' => 2,
            'name' => 'Escuela Digital Mediterráneo',
            'description' => 'Formación intensiva en diseño UX/UI y programación móvil.',
            'address' => 'Avenida del Mediterráneo 120, Almería',
            'phone' => '950654321',
            'email' => 'info@digitalmed.com',
        ]);
    }
}