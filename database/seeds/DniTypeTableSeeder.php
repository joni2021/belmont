<?php

use Illuminate\Database\Seeder;

class DniTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dni_types')->insert([
            [
                'id' => 1,
                'type' => 'DNI'
            ],
            [
                'id' => 2,
                'type' => 'CI'
            ],
            [
                'id' => 3,
                'type' => 'LE'
            ],
            [
                'id' => 4,
                'type' => 'LC'
            ]
        ]);

    }
}
