<?php

use Illuminate\Database\Seeder;
use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states =  [
            ['name'=>'Activo', 'description' => 'Tarea activa'],
            ['name'=>'Inactivo', 'description' => 'Tarea inactiva'],
            ['name'=>'Revisión', 'description' => 'Tarea en pruebas y revisión'],
            ['name'=>'Finalizada', 'description' => 'Tarea completada y entregada'],
            ['name'=>'Archivada', 'description' => 'Tarea archivada']
        ];


        foreach ($states as $state) {
            State::create($state);
        }
    }
}
