<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(Role_has_permissionsTableSeeder::class);
        $this->call(User_has_rolesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
    }
}
