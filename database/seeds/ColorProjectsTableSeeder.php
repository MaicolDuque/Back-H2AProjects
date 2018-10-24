<?php

use Illuminate\Database\Seeder;
use App\ColorProject;

class ColorProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors =  [
            ['value'=>'Verde', 'description' => 'Color de finalizados'],
            ['value'=>'Rojo', 'description' => 'Color de pendientes']
        ];

        foreach ($colors as $color) {
            ColorProject::create($color);
        }
    }
}
