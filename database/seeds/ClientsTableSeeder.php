<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create("es_AR");

        for($i = 1;$i < 51; $i++ ):
            DB::table("clients")->insert([
                "id"    => $i,
                "name"  => $faker->name,
                "last_name"  => $faker->lastName,
                "dni_type_id"  => rand(1,4),
                "dni"  => Faker\Provider\es_PE\Person::dni(),
                "address"  => $faker->address,
                "city"  => $faker->city,
                "province"  => $faker->state,
                "phone"  => $faker->phoneNumber,
                "cp"  => 1322,
                "cel"  => $faker->phoneNumber,
                "job_name"  => $faker->company,
                "created_at"  => date("Y-m-d H:i:s")
            ]);
        endfor;
    }
}
