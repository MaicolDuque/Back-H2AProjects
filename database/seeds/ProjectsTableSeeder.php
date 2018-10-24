<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects =  [
            ['name'=>'ISAGEN', 'description' => 'Empresa de energía', 'color_id' => 1],
            ['name'=>'CONINSA', 'description' => 'Empresa inmobiliaria y contructora','color_id' => 2],
            ['name'=>'AKT', 'description' => 'Empresa ensambladora de motocicletas','color_id' => 1]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
