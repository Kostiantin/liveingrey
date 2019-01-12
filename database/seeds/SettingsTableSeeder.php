<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public static $aSettings = [
        0 => [
            'name' => 'facebook',
            'value' => '',
            'content_type' => 'link',
            'active' => 1,
        ],
        1 => [
            'name' => 'instagram',
            'value' => '',
            'content_type' => 'link',
            'active' => 1,
        ],
        2 => [
            'name' => 'titter',
            'value' => '',
            'content_type' => 'link',
            'active' => 1,
        ],
        3 => [
            'name' => 'linkedin',
            'value' => '',
            'content_type' => 'link',
            'active' => 1,
        ],
        4 => [
            'name' => 'pinterest',
            'value' => '',
            'content_type' => 'link',
            'active' => 1,
        ],
        5 => [
            'name' => 'logo',
            'value' => '/img/logo.png',
            'content_type' => 'image',
            'active' => 1,
        ],
    ];

    public function run()
    {
        foreach (self::$aSettings as $setting) {
            DB::table('settings')->insert([
                'name' => $setting['name'],
                'value' => $setting['value'],
                'content_type' => $setting['content_type'],
                'active' => $setting['active'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
