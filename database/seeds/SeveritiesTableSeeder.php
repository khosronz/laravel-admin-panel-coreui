<?php

use Illuminate\Database\Seeder;

class SeveritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('severities')->insert([
            ['title' => 'زیاد', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'متوسط', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'کم', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
