<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = [
            ['parent_id' => 0, 'section_id' => 1, 'category_name' =>'T-Shirts', 'category_image'=>'',
            'category_discount' => 0, 'url' => 't-shirts', 'meta_title'=>'', 'meta_description'=>'',
            'meta_keywords' => '', 'status' => 1],

            ['parent_id' => 1, 'section_id' => 1, 'category_name' =>'Casual T-Shirts', 'category_image'=>'',
            'category_discount' => 0, 'url' => 'casual-t-shirts', 'meta_title'=>'', 'meta_description'=>'',
            'meta_keywords' => '', 'status' => 1]
        ];

        Category::insert($categories);
    }
}
