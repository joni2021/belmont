<?php

use Illuminate\Database\Seeder;

class AdditionalCostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('additional_costs')->insert([
           [
               'id' => 1,
               'name' => 'Gastos de evaluación y otorgamiento',
               'amount' => 0,
               'porcent' => false
           ],
            [
               'id' => 2,
               'name' => 'Gastos de mantenimiento de la cuenta y asociados',
               'amount' => 0,
               'porcent' => false
           ],
            [
               'id' => 3,
               'name' => 'Seguro de vida mensual',
               'amount' => 0,
               'porcent' => false
           ],
        ]);
    }
}
