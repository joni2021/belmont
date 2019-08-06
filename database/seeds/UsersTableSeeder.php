<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'id' => 1,
            'name' => 'admin',
            'last_name' => 'admin',
            'dni' => "1231232",
            'dni_type_id' => 1,
            'company_id' => 1,
            'user' => "admin",
            'email' => "admin@admin.com",
            'password' => bcrypt('admin')
        ]);
    }
}
