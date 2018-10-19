<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups =  [
            ['name'=>'H2A', 'description' => 'Grupo de usuarios encargados de toda la parte de diseño'],
            ['name'=>'TRAINME', 'description' => 'Grupo de usuarios encargados de la plataforma']
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
