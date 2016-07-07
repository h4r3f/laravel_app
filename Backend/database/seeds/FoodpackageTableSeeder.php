<?php

use Illuminate\Database\Seeder;

class FoodpackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('food_package')->insert([
            'food_id' => 1,
            'package_id' => 1,
                ]
        );
        DB::table('food_package')->insert([
            'food_id' => 2,
            'package_id' => 2,
                ]
        );
        DB::table('food_package')->insert([
            'food_id' => 3,
            'package_id' => 3,
                ]
        );
        DB::table('food_package')->insert([
            'food_id' => 4,
            'package_id' => 1,
                ]
        );
        DB::table('food_package')->insert([
            'food_id' => 5,
            'package_id' => 2,
                ]
        );
        DB::table('food_package')->insert([
            'food_id' => 6,
            'package_id' => 3,
                ]
        );
        DB::table('food_package')->insert([
            'food_id' => 7,
            'package_id' => 1,
                ]
        );
        DB::table('food_package')->insert([
            'food_id' => 8,
            'package_id' => 2,
                ]
        );
        DB::table('food_package')->insert([
            'food_id' => 9,
            'package_id' => 3,
                ]
        );
        DB::table('food_package')->insert([
            'food_id' => 10,
            'package_id' => 4,
                ]
        );
    }
}
