<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public static $aSettings = [
        0 => [
            'name' => 'facebook',
            'label' => 'Facebook Link',
            'value' => 'http://facebook.com',
            'content_type' => 'link',
            'active' => 1,
        ],
        1 => [
            'name' => 'instagram',
            'label' => 'Instagram Link',
            'value' => 'http://instagram.com',
            'content_type' => 'link',
            'active' => 1,
        ],
        2 => [
            'name' => 'twitter',
            'label' => 'Twitter Link',
            'value' => 'http://twitter.com',
            'content_type' => 'link',
            'active' => 1,
        ],
        3 => [
            'name' => 'linkedin',
            'label' => 'LinkedIn Link',
            'value' => 'http://linkedin.com',
            'content_type' => 'link',
            'active' => 1,
        ],
        4 => [
            'name' => 'pinterest',
            'label' => 'Pinterest Link',
            'value' => 'http://pinterest.com',
            'content_type' => 'link',
            'active' => 1,
        ],
        5 => [
            'name' => 'logo',
            'label' => 'Logo',
            'value' => '',
            'content_type' => 'image',
            'active' => 1,
        ],
    ];

    public function run()
    {
        foreach (self::$aSettings as $setting) {
            DB::table('settings')->insert([
                'name' => $setting['name'],
                'label' => $setting['label'],
                'value' => $setting['value'],
                'content_type' => $setting['content_type'],
                'active' => $setting['active'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
