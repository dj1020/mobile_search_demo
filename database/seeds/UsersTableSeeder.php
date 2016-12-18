<?php

use App\User;
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
        DB::table('users')->truncate();

        factory(App\User::class)->create([
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);

        factory(App\User::class)->create([
            'username' => 'client',
            'password' => bcrypt('client')
        ]);

        factory(App\User::class)->create([
            'username' => 'editor',
            'password' => bcrypt('editor')
        ]);
    }
}
