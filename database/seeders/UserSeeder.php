<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



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
            'firstname' => 'Admin',
            'lastname' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'status' => '1',
            'role' => 'admin'
        ]);
    }
}
