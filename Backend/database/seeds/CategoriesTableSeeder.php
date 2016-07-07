<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->insert([
            'name' => 'Combo',
            'image' => 'cat-1.jpg',
                ]
        );
        DB::table('categories')->insert([
            'name' => 'Kebab',
            'image' => 'cat-2.jpg',
                ]
        );
        DB::table('categories')->insert([
            'name' => 'Biryani',
            'image' => 'cat-3.jpg',
                ]
        );
    }

}
