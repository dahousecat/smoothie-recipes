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
            'name' => 'Felix',
            'email' => 'dahousecat@gmail.com',
            'password' => bcrypt('password'),
            'api_token' => str_random(60),
        ]);
    }
}
