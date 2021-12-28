<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'superadmin'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'admin'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'inventory manager'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'order manager'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Customer'
        ]);
    }
}
