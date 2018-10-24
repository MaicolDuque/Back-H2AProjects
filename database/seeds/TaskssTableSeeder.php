<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks =  [
            ['name'=>'Tarea 1', 'description' => 'Tarea','duration' => 5, 'archived' => 0, 'priority' => 'Alta', 'state_id' => 1, 'section_id' => 1, 'fecha_fin' => '2018-10-31 00:00:00'],
            ['name'=>'Tarea 2', 'description' => 'Tarea','duration' => 5, 'archived' => 0, 'priority' => 'Alta', 'state_id' => 1, 'section_id' => 1, 'fecha_fin' => '2018-10-31 00:00:00'],
            ['name'=>'Tarea 1', 'description' => 'Tarea','duration' => 3, 'archived' => 0, 'priority' => 'Alta', 'state_id' => 1, 'section_id' => 2, 'fecha_fin' => '2018-10-31 00:00:00'],
            ['name'=>'Tarea 2', 'description' => 'Tarea','duration' => 4, 'archived' => 0, 'priority' => 'Alta', 'state_id' => 1, 'section_id' => 2, 'fecha_fin' => '2018-10-31 00:00:00']            
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
