<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this line


class ePaperDataFirst extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('epapers')->insert([
            'title' => 'Page1',
            'image' => 'placement.jpg',
            'extra1' => null,
            'map_id' => null,
        ]);
    }
}
