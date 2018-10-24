<?php

use Illuminate\Database\Seeder;
use App\TaskUser;

class TaskUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task_users =  [
            ['user_id'=>1, 'task_id' => 2],
            ['user_id'=>1, 'task_id' => 1],
            ['user_id'=>1, 'task_id' => 3],
            ['user_id'=>2, 'task_id' => 4]
        ];

        foreach ($task_users as $task) {
            TaskUser::create($task);
        }
    }
}
