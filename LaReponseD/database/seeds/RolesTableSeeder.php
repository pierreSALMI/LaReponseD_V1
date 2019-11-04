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
        $role = Role::create(['name' => 'Administrator']);
        $role = Role::create(['name' => 'Moderator']);
        $role = Role::create(['name' => 'User']);
    }
}
