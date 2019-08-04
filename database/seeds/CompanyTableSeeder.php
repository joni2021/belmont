<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'id' => 1,
                'name' => "BELMONT CAPITAL S.A",
                'address' => "Thames 1617 Piso 1, Capital Federal, Ciudad de Buenos Aires"
            ],
            [
                'id' => 2,
                'name' => "DLP CAPITAL PARTNERS S.A",
                'address' => "Thames 1617 Piso 1, Capital Federal, Ciudad de Buenos Aires"
            ],

        ]);
    }
}
