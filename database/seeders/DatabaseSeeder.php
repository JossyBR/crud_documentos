<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('pro_proceso')->insert([
            ['pro_id' => 1, 'pro_prefijo' => 'ING', 'pro_nombre' => 'Ingenieria'],
            ['pro_id' => 2, 'pro_prefijo' => 'ADM', 'pro_nombre' => 'Administración'],
            ['pro_id' => 3, 'pro_prefijo' => 'RH', 'pro_nombre' => 'Recursos Humanos'],
            ['pro_id' => 4, 'pro_prefijo' => 'COM', 'pro_nombre' => 'Comercial'],
            ['pro_id' => 5, 'pro_prefijo' => 'SST', 'pro_nombre' => 'Salud Ocupacional'],
        ]);

        DB::table('tip_tipo_doc')->insert([
            ['tip_id' => 1, 'tip_prefijo' => 'PRO', 'tip_nombre' => 'Programa'],
            ['tip_id' => 2, 'tip_prefijo' => 'MAN', 'tip_nombre' => 'Manual'],
            ['tip_id' => 3, 'tip_prefijo' => 'MT', 'tip_nombre' => 'Matriz'],
            ['tip_id' => 4, 'tip_prefijo' => 'POL', 'tip_nombre' => 'Política'],
            ['tip_id' => 5, 'tip_prefijo' => 'PROC', 'tip_nombre' => 'Procedimiento'],
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
