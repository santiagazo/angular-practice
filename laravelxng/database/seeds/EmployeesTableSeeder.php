<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('employees')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'contact_number' => $faker->phoneNumber,
	            'position' => $faker->company
	        ]);
        }
    }
}
