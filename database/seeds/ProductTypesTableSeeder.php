<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('product_types')->delete();

        $now = \Carbon\Carbon::now();

        \Illuminate\Support\Facades\DB::table('product_types')->insert([
            ['title' => 'Server Ping', 'desc' => 'این پنل سرور شما را هر یک دقیقه پینگ کرده و در صورتی که قطعی در پینگ رخ دهد به شما یک پیام ارسال می کند.', 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Web Request', 'desc' => 'این پنل سرور شما هر یک دقیقه مورد بررسی قرار خواهد گرفت و در صورت کندی پاسخ یا قطعی به شما ایمیل ارسال می کند.', 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Linux Panel', 'desc' => 'با این پنل هر یک دقیقه سرور لینوکسی شما مورد بررسی قرار خواهد گرفت و در صورتی که بار ترافیکی زیادی روی منابع شما باشد آن ها را با ایمیل به اطلاع شما می رساند.', 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Windows Panel', 'desc' => 'با این پنل هر یک دقیقه سرور ویندوزی شما مورد بررسی قرار خواهد گرفت و در صورتی که بار ترافیکی زیادی روی منابع شما باشد آن ها را با ایمیل به اطلاع شما می رساند.', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
