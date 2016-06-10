<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        DB::table('permissions')->insert([
            'id' => 1,
            'name' => 'View Associated User Financial Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 2,
            'name' => 'View Associated User Realty Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 3,
            'name' => 'View Associated User Title Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 4,
            'name' => 'View Associated User Inspection Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 5,
            'name' => 'View Associated Lender Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 6,
            'name' => 'View Associated Realtor Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 7,
            'name' => 'View Associated Title Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 8,
            'name' => 'View Associated Inspector Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 9,
            'name' => 'Sign Associated Realtor Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 10,
            'name' => 'Sign Associated Inspector Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 11,
            'name' => 'Sign Associated Title Files',
        ]);
        DB::table('permissions')->insert([
            'id' => 12,
            'name' => 'Sign Associated Lender Files',
        ]);
    }
}
