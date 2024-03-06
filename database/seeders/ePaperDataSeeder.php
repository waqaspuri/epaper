<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ePaperDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
DB::table('epapers')->insert([
            [
                'title' => 'Front Page',
                'image' => 'placement.jpg',
                'extra1' => null,
                'map_id' => null,
            ],
            // Add more sample data as needed
        ]);

    }
}
