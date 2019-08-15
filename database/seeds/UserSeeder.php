<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'Thomas',
            'email' => 'thmsjimenez@gmail.com',
            'password' => bcrypt('test1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Rouss',
            'email' => 'roussimel@gmail.com',
            'password' => bcrypt('test2'),
        ]);

        DB::table('users')->insert([
            'name' => 'July',
            'email' => 'july@gmail.com',
            'password' => bcrypt('test3'),
        ]);
 
    }
}
