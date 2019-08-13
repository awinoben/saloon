<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employer = new Role();
        $role_employer->name = 'employer';
        $role_employer->description = 'Employer user';
        $role_employer->save();

        $role_staff = new Role();
        $role_staff->name = "staff";
        $role_staff->description = 'An employee User';
        $role_staff->save();

        $role_customer = new Role();
        $role_customer->name = 'client';
        $role_customer->description = 'A customer User';
        $role_customer->save();
    }
}
