<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
            ['name'=>'Maicol', 'email' => 'maicol@maicol.com', 'picture' => 'maicol.jpg', 'is_admin' => 1, 'state' => 1, 'group_id' => 1, 'occupation_id' => 1, 'password' => bcrypt('123456')],
            ['name'=>'Horacio', 'email' => 'horacio@horacio.com', 'picture' => 'horacio.jpg', 'is_admin' => 0, 'state' => 1, 'group_id' => 1, 'occupation_id' => 1, 'password' => bcrypt('654321')]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
