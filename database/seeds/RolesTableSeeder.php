<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'Administrator of application',
        ]);

        DB::table('roles')->insert([
            'name' => 'coach',
            'description' => 'Coach',
        ]);

        DB::table('roles')->insert([
            'name' => 'client',
            'description' => 'Client',
        ]);
    }
}
