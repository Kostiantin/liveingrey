<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static $aPageSections = ['Page Header', 'Middle of Page', 'Footer', 'General'];

    public function run()
    {
        foreach (self::$aPageSections as $section_name) {
            DB::table('sections')->insert([
                'name' => $section_name,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
