<?php

use Illuminate\Database\Seeder;
use App\Occupation;
class OccupationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupation =  [
            ['name'=>'Desarrollador web', 'description' => 'TIC'],
            ['name'=>'Diseñador', 'description' => 'Photoshop']
        ];

        foreach ($occupation as $occ) {
            Occupation::create($occ);
        }
    }
}
