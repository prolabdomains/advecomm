<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        $sectionsRecords = [
            ['name' => 'Men', 'status' => 1],
            ['name' => 'Women', 'status' => 1],
            ['name' => 'Kids', 'status' => 1]
        ];

        DB::table('sections')->insert($sectionsRecords);
    }
}
