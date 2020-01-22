<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('organizations')->insert([
            ['title' => 'فروش','desc' => 'سوالات مربوط به فروش', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'پشتیبانی', 'desc' => 'پشتیبانی فنی','created_at' => now(), 'updated_at' => now()],
            ['title' => 'لایسنس', 'desc' => 'مشکلات و خطاهای مربوط به لایسنس','created_at' => now(), 'updated_at' => now()],
            ['title' => 'سرویس مشتری','desc' => 'حساب کاربری و گزارش های خرید', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'گذارش خطا', 'desc' => 'گزارش خاطا و باگ','created_at' => now(), 'updated_at' => now()],
            ['title' => 'درخواست قابلیت', 'desc' => 'درخواست قابلیت های مورد نیاز','created_at' => now(), 'updated_at' => now()],
            ['title' => 'فروشگاه', 'desc' => 'سرویس و پشتیبانی','created_at' => now(), 'updated_at' => now()],
            ['title' => 'همکاری درفروش / ریسلر','desc' => 'دریافت نمایندگی', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
