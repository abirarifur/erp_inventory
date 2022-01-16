<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => "Md. Mahadi Hassan",
            'lastName' => "Razib",
            'email' => "mhrazib.cit.bd@gmail.com",
            'password' => bcrypt('raz0172834621'),
        ]);
    }
}
