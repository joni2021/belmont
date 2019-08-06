<?php

use Illuminate\Database\Seeder;

class ClientUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 21; $i++):
            DB::table('client_user')->insert([
               'id' => $i,
                'client_id' => $i,
                'user_id' => 1,
                'company_id' => 1
            ]);
        endfor;
    }
}
