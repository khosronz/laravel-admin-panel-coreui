<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('products')->delete();

        $now = \Carbon\Carbon::now();

        $firstWebPage = \Illuminate\Support\Facades\DB::table('products')->insertGetId(
            [
                'title' => 'مانیتورینگ صفحه اول وبسایت',
                'desc' => 'این پنل سرور شما را هر یک دقیقه پینگ کرده و در صورتی که قطعی در پینگ رخ دهد به شما یک پیام ارسال می کند.',
                'product_visits' => 0,
                'user_id' => \App\User::all()->first()->id,
                'product_type_id' => \App\Models\ProductType::all()->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ]
        );

        \Illuminate\Support\Facades\DB::table('product_features')->insert([
            [
                'title' => '100',
                'price' => '40000',
                'desc' => 'ایمیل',
                'product_id' => $firstWebPage,
                'created_at' => $now,
                'updated_at' => $now
            ],[
                'title' => '100',
                'price' => '40000',
                'desc' => 'پیامک',
                'product_id' => $firstWebPage,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);


        $serverPing = \Illuminate\Support\Facades\DB::table('products')->insertGetId(
            [
                'title' => 'پینگ سرور',
                'desc' => 'این پنل سرور شما هر یک دقیقه مورد بررسی قرار خواهد گرفت و در صورت کندی پاسخ یا قطعی به شما ایمیل ارسال می کند.',
                'product_visits' => 0,
                'user_id' => \App\User::all()->first()->id,
                'product_type_id' => \App\Models\ProductType::all()->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ]
        );
        \Illuminate\Support\Facades\DB::table('product_features')->insert([
            [
                'title' => '100',
                'price' => '40000',
                'desc' => 'ایمیل',
                'product_id' => $serverPing,
                'created_at' => $now,
                'updated_at' => $now
            ],[
                'title' => '100',
                'price' => '40000',
                'desc' => 'پیامک',
                'product_id' => $serverPing,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);

        $linuxMonitoring = \Illuminate\Support\Facades\DB::table('products')->insertGetId(
            [
                'title' => 'مانیتورینگ سرور لینوکس',
                'desc' => 'با این پنل هر یک دقیقه سرور لینوکسی شما مورد بررسی قرار خواهد گرفت و در صورتی که بار ترافیکی زیادی روی منابع شما باشد آن ها را با ایمیل به اطلاع شما می رساند.',
                'product_visits' => 0,
                'user_id' => \App\User::all()->first()->id,
                'product_type_id' => \App\Models\ProductType::all()->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ]
        );

        \Illuminate\Support\Facades\DB::table('product_features')->insert([
            [
                'title' => '100',
                'price' => '40000',
                'desc' => 'ایمیل',
                'product_id' => $linuxMonitoring,
                'created_at' => $now,
                'updated_at' => $now
            ],[
                'title' => '100',
                'price' => '40000',
                'desc' => 'پیامک',
                'product_id' => $linuxMonitoring,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);

        $windowsMonitoring = \Illuminate\Support\Facades\DB::table('products')->insertGetId(
            [
                'title' => 'مانیتورینگ سرور ویندوز',
                'desc' => 'با این پنل هر یک دقیقه سرور ویندوزی شما مورد بررسی قرار خواهد گرفت و در صورتی که بار ترافیکی زیادی روی منابع شما باشد آن ها را با ایمیل به اطلاع شما می رساند.',
                'product_visits' => 0,
                'user_id' => \App\User::all()->first()->id,
                'product_type_id' => \App\Models\ProductType::all()->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ]
        );

        \Illuminate\Support\Facades\DB::table('product_features')->insert([
            [
                'title' => '100',
                'price' => '40000',
                'desc' => 'ایمیل',
                'product_id' => $windowsMonitoring,
                'created_at' => $now,
                'updated_at' => $now
            ],[
                'title' => '100',
                'price' => '40000',
                'desc' => 'پیامک',
                'product_id' => $windowsMonitoring,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
