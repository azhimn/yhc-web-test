<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ardi',
            'email' => 'ardi@mail.com',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Aldi Nagara',
            'email' => 'alna@mail.com',
            'password' => bcrypt('password'),
            'admin' => 0,
        ]);
    }
}
