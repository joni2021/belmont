<?php

use Illuminate\Database\Seeder;

class ArchiveTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('archive_types')->insert([
           [
               'id' => 1,
               'name' => 'DNI',
               'slug' => 'dni'
           ],
            [
               'id' => 2,
               'name' => 'Recibo de sueldo',
               'slug' => 'paycheck'
           ],
            [
               'id' => 3,
               'name' => 'Contrato',
               'slug' => 'contract'
           ],
            [
               'id' => 4,
               'name' => 'Pagaré',
               'slug' => 'promissory_note'
           ],
            [
               'id' => 5,
               'name' => 'Servicio',
               'slug' => 'service'
           ],
            [
               'id' => 6,
               'name' => 'Otros',
               'slug' => 'others'
           ],

        ]);
    }
}
