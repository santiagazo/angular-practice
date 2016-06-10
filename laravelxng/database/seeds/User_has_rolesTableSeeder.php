<?php

use Illuminate\Database\Seeder;

class User_has_rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_has_roles')->delete();

        DB::table('user_has_roles')->insert([
        	'role_id' => '1',
         	'user_id' => '1',
        ]);

        DB::table('user_has_roles')->insert([
        	'role_id' => '2',
         	'user_id' => '10',
        ]);

        DB::table('user_has_roles')->insert([
        	'role_id' => '4',
         	'user_id' => '6',
        ]);

        DB::table('user_has_roles')->insert([
        	'role_id' => '4',
         	'user_id' => '7',
        ]);

        DB::table('user_has_roles')->insert([
        	'role_id' => '5',
         	'user_id' => '8',
        ]);

        DB::table('user_has_roles')->insert([
        	'role_id' => '5',
         	'user_id' => '9',
        ]);

        DB::table('user_has_roles')->insert([
            'role_id' => '4',
            'user_id' => '2',
        ]);

        DB::table('user_has_roles')->insert([
            'role_id' => '4',
            'user_id' => '3',
        ]);

        DB::table('user_has_roles')->insert([
            'role_id' => '3',
            'user_id' => '11',
        ]);
    }
}
