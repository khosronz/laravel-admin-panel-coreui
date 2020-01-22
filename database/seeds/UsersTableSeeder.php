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
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'name' => 'khosronz',
                'email' => 'khosronz.com@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'khosro',
                'email' => 'khosro.pub@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
