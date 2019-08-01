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
               'type' => 'dni'
           ],
            [
               'id' => 2,
               'type' => 'paycheck'
           ],
            [
               'id' => 3,
               'type' => 'contract'
           ],
            [
               'id' => 4,
               'type' => 'promissory_note'
           ],
        ]);
    }
}
