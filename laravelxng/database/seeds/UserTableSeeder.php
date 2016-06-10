<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

         DB::table('users')->insert([
         	'id' => '1',
         	'social_media_outlet' => 'facebook',
         	'social_id' => '10153587588167894',
            'name' => 'Jay Lara',
            'email' => 'santiagazo@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => 'tcX0KOAFgrVOO2ISkve3JkopOTrR8C4OyAtXrKFVU0QY18BekE7VVDnJoF59',
            'avatar' => 'https://graph.facebook.com/v2.5/10153587588167894/picture?type=normal',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
        	'id' => '2',
         	'social_media_outlet' => NULL,
         	'social_id' => NULL,
            'name' => 'Glock Lockjaw',
            'firstname' => 'Glock',
            'lastname' => 'Lockjaw',
            'username' => 'glocklockjaw',
            'email' => 'glocklockjaw@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => NULL,
            'avatar' => 'http://lorempixel.com/100/100/fashion',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
        	'id' => '3',
         	'social_media_outlet' => NULL,
         	'social_id' => NULL,
            'name' => 'Bubba Killdeer',
            'firstname' => 'Bubba',
            'lastname' => 'Killdeer',
            'username' => 'BubbaKilldeer',
            'email' => 'BubbaKilldeer@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => NULL,
            'avatar' => 'http://lorempixel.com/100/100/cat',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
        	'id' => '5',
         	'social_media_outlet' => NULL,
         	'social_id' => NULL,
            'name' => 'Johnny Lender',
            'firstname' => 'Johnny',
            'lastname' => 'Lender',
            'username' => 'JohnnyLender',
            'email' => 'JohnnyLender@ygmail.com',
            'password' => bcrypt('password'),
            'remember_token' => NULL,
            'avatar' => 'http://lorempixel.com/100/100/people',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
        	'id' => '6',
         	'social_media_outlet' => NULL,
         	'social_id' => NULL,
            'name' => 'Billy Buyer',
            'firstname' => 'Billy',
            'lastname' => 'Buyer',
            'username' => 'BillyBuyer',
            'email' => 'BillyBuyer@ygmail.com',
            'password' => bcrypt('password'),
            'remember_token' => NULL,
            'avatar' => 'http://lorempixel.com/100/100/people',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
        	'id' => '7',
         	'social_media_outlet' => NULL,
         	'social_id' => NULL,
            'name' => 'Betty Buyer',
            'firstname' => 'Betty',
            'lastname' => 'Buyer',
            'username' => 'BettyBuyer',
            'email' => 'BettyBuyer@ygmail.com',
            'password' => bcrypt('password'),
            'remember_token' => NULL,
            'avatar' => 'http://lorempixel.com/100/100/people',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
        	'id' => '8',
         	'social_media_outlet' => NULL,
         	'social_id' => NULL,
            'name' => 'Sam Seller',
            'firstname' => 'Sam',
            'lastname' => 'Seller',
            'username' => 'SamSeller',
            'email' => 'SamSeller@ygmail.com',
            'password' => bcrypt('password'),
            'remember_token' => NULL,
            'avatar' => 'http://lorempixel.com/100/100/people',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
        	'id' => '9',
         	'social_media_outlet' => NULL,
         	'social_id' => NULL,
            'name' => 'Sally Seller',
            'firstname' => 'Sally',
            'lastname' => 'Seller',
            'username' => 'SallySeller',
            'email' => 'SallySeller@ygmail.com',
            'password' => bcrypt('password'),
            'remember_token' => NULL,
            'avatar' => 'http://lorempixel.com/100/100/people',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
        	'id' => '10',
         	'social_media_outlet' => NULL,
         	'social_id' => NULL,
            'name' => 'Larry Lender',
            'firstname' => 'Larry',
            'lastname' => 'Lender',
            'username' => 'LarryLender',
            'email' => 'LarryLender@ygmail.com',
            'password' => bcrypt('password'),
            'remember_token' => NULL,
            'avatar' => 'http://lorempixel.com/100/100/people',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'id' => '11',
            'social_media_outlet' => NULL,
            'social_id' => NULL,
            'name' => 'Old Republic',
            'firstname' => 'Old',
            'lastname' => 'Republic',
            'username' => 'OldRepublic',
            'email' => 'OldRepublic@ygmail.com',
            'password' => bcrypt('password'),
            'remember_token' => NULL,
            'avatar' => 'http://lorempixel.com/100/100/people',
            'activation_code' => str_random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
