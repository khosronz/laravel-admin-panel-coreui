<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('attributes')->delete();

        $now = \Carbon\Carbon::now();

        \Illuminate\Support\Facades\DB::table('attributes')->insert([
            ['code' => 'name', 'admin_name' => 'Name', 'type' => 'text', 'validation' => NULL, 'is_required' => '1', 'is_unique' => '0', 'value_per_locale' => '1', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'url_key', 'admin_name' => 'URL Key', 'type' => 'text', 'validation' => NULL, 'is_required' => '1', 'is_unique' => '1', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'new', 'admin_name' => 'New', 'type' => 'boolean', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'featured', 'admin_name' => 'Featured', 'type' => 'boolean', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'status', 'admin_name' => 'Status', 'type' => 'boolean', 'validation' => NULL, 'is_required' => '1', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'short_description', 'admin_name' => 'Short Description', 'type' => 'textarea', 'validation' => NULL, 'is_required' => '1', 'is_unique' => '0', 'value_per_locale' => '1', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'description', 'admin_name' => 'Description', 'type' => 'textarea', 'validation' => NULL, 'is_required' => '1', 'is_unique' => '0', 'value_per_locale' => '1', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'price', 'admin_name' => 'Price', 'type' => 'price', 'validation' => 'decimal', 'is_required' => '1', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '1', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'cost', 'admin_name' => 'Cost', 'type' => 'price', 'validation' => 'decimal', 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '1', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'special_price', 'admin_name' => 'Special Price', 'type' => 'price', 'validation' => 'decimal', 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'special_price_from', 'admin_name' => 'Special Price From', 'type' => 'date', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'special_price_to', 'admin_name' => 'Special Price To', 'type' => 'date', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'meta_title', 'admin_name' => 'Meta Title', 'type' => 'textarea', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '1', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'meta_keywords', 'admin_name' => 'Meta Keywords', 'type' => 'textarea', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '1', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'meta_description', 'admin_name' => 'Meta Description', 'type' => 'textarea', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '1', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '1', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'color', 'admin_name' => 'Color', 'type' => 'select', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '1', 'is_configurable' => '1', 'is_user_defined' => '1', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'email_num', 'admin_name' => 'Email Number', 'type' => 'select', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '1', 'is_configurable' => '1', 'is_user_defined' => '1', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'sms_num', 'admin_name' => 'SMS Number', 'type' => 'select', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '1', 'is_configurable' => '1', 'is_user_defined' => '1', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'interval', 'admin_name' => 'Interval', 'type' => 'select', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '1', 'is_configurable' => '1', 'is_user_defined' => '1', 'is_visible_on_front' => '0', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'brand', 'admin_name' => 'Brand', 'type' => 'select', 'validation' => NULL, 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '1', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '1', 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}
