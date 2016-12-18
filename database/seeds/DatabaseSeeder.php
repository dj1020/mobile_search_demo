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
        DB::unprepared(file_get_contents(base_path('/mobile_search_20160220.sql')));
        $this->call(UsersTableSeeder::class);
    }
}
