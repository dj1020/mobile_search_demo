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
//        DB::table('users')->truncate();

        $users = factory(App\User::class, 3)->create([
            'password' => bcrypt('pass')
        ]);

        $users->each(function(User $user){
            $user->assignRole('guest');
        });

        $users->get(0)->assignRole('admin');
    }
}
