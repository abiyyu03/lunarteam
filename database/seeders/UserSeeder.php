<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'username' => 'admin',
            'password' => bcrypt(123123123123),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}
