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

        for($i = 1; $i < 12;$i++):
            DB::table("financing")->insert([
               [
                   "id"         => $i,
                   "due"        => $i+1,
                   "porcent"    => 10.1,
                   "created_at" => date("Y-m-d H:i:s")
               ]
            ]);
        endfor;

        for($i = 13; $i < 23;$i++):
            DB::table("financing")->insert([
               [
                   "id"         => $i,
                   "due"        => $i+1,
                   "porcent"    => 9.1,
                   "created_at" => date("Y-m-d H:i:s")
               ]
            ]);
        endfor;

        DB::table("financing")->insert([
            [
                "id"         => 23,
                "due"        => 24,
                "porcent"    => 7.95,
                "created_at" => date("Y-m-d H:i:s")
            ]
        ]);

        for($i = 25; $i < 30;$i++):
            DB::table("financing")->insert([
                [
                    "id"         => $i,
                    "due"        => $i+1,
                    "porcent"    => 8.1,
                    "created_at" => date("Y-m-d H:i:s")
                ]
            ]);
        endfor;

        for($i = 31; $i < 35;$i++):
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
                "id"         => 35,
                "due"        => 36,
                "porcent"    => 6.42,
                "created_at" => date("Y-m-d H:i:s")
            ]
        ]);

    }
}
