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
        $adminRole = \Illuminate\Support\Facades\DB::table('roles')->insert([
            ['id'=>\App\Enums\UserType::admin,'title' => 'admin', 'desc' => 'Administrator Of System', 'created_at' => now(), 'updated_at' => now()],
            ['id'=>\App\Enums\UserType::user,'title' => 'user', 'desc' => 'Buyer of service', 'created_at' => now(), 'updated_at' => now()]
        ]);

        \Illuminate\Support\Facades\DB::table('role_user')->insertGetId([
            'role_id' => \App\Enums\UserType::admin, 'user_id' => \App\User::where('id',\App\Enums\UserType::admin)->first()->id,
        ]);


        \Illuminate\Support\Facades\DB::table('role_user')->insertGetId([
            'role_id' => \App\Enums\UserType::user, 'user_id' => \App\User::where('id',\App\Enums\UserType::user)->first()->id,
        ]);
    }
}
