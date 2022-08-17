<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => "Admin",
            'name' => "Michael Raheem",
            'email' => "abiolar544@gmail.com",
            'phone' => "09071140264",
            'status' => "3",
            'password' => Hash::make('R@h33mstan'),
        ]);
    }
}
