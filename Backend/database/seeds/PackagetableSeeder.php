<?php

use Illuminate\Database\Seeder;

class PackagetableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('packages')->insert([
            'name' => 'Dinner',
            'image' => 'package-1.jpg',
            'price' => 1000,
                ]
        );
        DB::table('packages')->insert([
            'name' => 'Breakfast',
            'image' => 'package-2.jpg',
            'price' => 500,
                ]
        );
        DB::table('packages')->insert([
            'name' => 'Lunch',
            'image' => 'package-3.jpg',
            'price' => 200,
                ]
        );
    }

}
