<?php

use Illuminate\Database\Seeder;

class CategoryfoodTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('category_food')->insert([
            'category_id' => 1,
            'food_id' => 1,
                ]
        );
        DB::table('category_food')->insert([
            'category_id' => 1,
            'food_id' => 2,
                ]
        );
        DB::table('category_food')->insert([
            'category_id' => 1,
            'food_id' => 3,
                ]
        );
        DB::table('category_food')->insert([
            'category_id' => 2,
            'food_id' => 4,
                ]
        );
        DB::table('category_food')->insert([
            'category_id' => 2,
            'food_id' => 5,
                ]
        );
        DB::table('category_food')->insert([
            'category_id' => 2,
            'food_id' => 6,
                ]
        );
        DB::table('category_food')->insert([
            'category_id' => 3,
            'food_id' => 7,
                ]
        );
        DB::table('category_food')->insert([
            'category_id' => 3,
            'food_id' => 8,
                ]
        );
        DB::table('category_food')->insert([
            'category_id' => 3,
            'food_id' => 9,
                ]
        );
        DB::table('category_food')->insert([
            'category_id' => 3,
            'food_id' => 10,
                ]
        );
    }

}
