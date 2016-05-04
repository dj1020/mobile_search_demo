<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        foreach (allTableInDB() as $tableName) {
            $admin->givePermissionTo('create.' . $tableName);
            $admin->givePermissionTo('read.'   . $tableName);
            $admin->givePermissionTo('update.' . $tableName);
            $admin->givePermissionTo('delete.' . $tableName);
        }

        Role::create(['name' => 'user']);
        Role::create(['name' => 'guest']);
    }
}
