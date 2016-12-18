<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name'     => 'admin',
            'password' => bcrypt('admin'),
        ]);

        factory(App\User::class)->create([
            'name'     => 'client',
            'password' => bcrypt('client'),
        ]);

        factory(App\User::class)->create([
            'name'     => 'editor',
            'password' => bcrypt('editor'),
        ]);
    }
}
