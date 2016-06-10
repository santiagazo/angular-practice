<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Realtor',
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Lender',
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Title Company',
        ]);
        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'Buyer',
        ]);
        DB::table('roles')->insert([
            'id' => 5,
            'name' => 'Seller',
        ]);
    }
}
