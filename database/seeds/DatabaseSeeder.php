<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupsTableSeeder::class);
        $this->call(OccupationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ColorProjectsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        


    }
}
