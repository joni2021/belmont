<?php

use Illuminate\Database\Seeder;

class financingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 1; $i < 14;$i++):
            DB::table("financing")->insert([
               [
                   "id"         => $i,
                   "due"        => $i,
                   "porcent"    => 10.1,
                   "created_at" => date("Y-m-d H:i:s")
               ]
            ]);
        endfor;

        for($i = 14; $i < 24;$i++):
            DB::table("financing")->insert([
               [
                   "id"         => $i,
                   "due"        => $i,
                   "porcent"    => 9.1,
                   "created_at" => date("Y-m-d H:i:s")
               ]
            ]);
        endfor;

        DB::table("financing")->insert([
            [
                "id"         => 24,
                "due"        => 24,
                "porcent"    => 7.95,
                "created_at" => date("Y-m-d H:i:s")
            ]
        ]);

        for($i = 25; $i < 31;$i++):
            DB::table("financing")->insert([
                [
                    "id"         => $i,
                    "due"        => $i,
                    "porcent"    => 8.1,
                    "created_at" => date("Y-m-d H:i:s")
                ]
            ]);
        endfor;


        for($i = 31; $i < 36;$i++):
            DB::table("financing")->insert([
                [
                    "id"         => $i,
                    "due"        => $i+1,
                    "porcent"    => 7.1,
                    "created_at" => date("Y-m-d H:i:s")
                ]
            ]);
        endfor;

        DB::table("financing")->insert([
            [
                "id"         => 36,
                "due"        => 36,
                "porcent"    => 6.42,
                "created_at" => date("Y-m-d H:i:s")
            ]
        ]);

    }
}
