<?php

use Illuminate\Database\Seeder;

class AcreditationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accreditation_types')->insert([
           'id' => 1,
            'type' => 'Transferencia bancaria'
        ]);

        DB::table('accreditation_types')->insert([
           'id' => 2,
            'type' => 'Efectivo'
        ]);

    }
}
