<?php

use Illuminate\Database\Seeder;
use App\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections =  [
            ['name'=>'Proyecto 1', 'description' => 'Primer entrega', 'order'=>1,'project_id' => 1],
            ['name'=>'Proyecto 2', 'description' => 'Segunda entrega','order'=>1,'project_id' => 2],
            ['name'=>'Primer avance', 'description' => 'Empezando a diseñar plataforma','order'=>2,'project_id' => 1]
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
