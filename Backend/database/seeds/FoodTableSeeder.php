<?php

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('foods')->insert([
            'name' => 'Fried Chicken Drumpling',
            'details' => 'Chicken marinated with green chilli herbs, onion, spices & deep fry',
            'image' => 'food-1.jpg',
            'price' => 250,
            'special' => 'Yes',
            'activate' => 'Yes',
            'type' => 'Non-Veg',
            'slider' => 'Yes',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );
        DB::table('foods')->insert([
            'name' => 'Kunf Pao Stir Fry',
            'details' => 'Chicken cubes cooked with garlic, jinger, onion & black soya sauce',
            'image' => 'food-2.jpg',
            'price' => 239,
            'special' => 'Yes',
            'activate' => 'Yes',
            'type' => 'Non-Veg',
            'slider' => 'Yes',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );
        DB::table('foods')->insert([
            'name' => 'Chicken Ala Kiev',
            'details' => 'Rolled chicken stuffed with finely chopped, cheese, butter & spices',
            'image' => 'food-3.jpg',
            'price' => 249,
            'special' => 'No',
            'activate' => 'Yes',
            'type' => 'Veg',
            'slider' => 'No',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );

        DB::table('foods')->insert([
            'name' => 'Maryland Chicken',
            'details' => 'Marinated chicken fillet, crumb fried & serve with banan fritters',
            'image' => 'food-4.jpg',
            'price' => 109,
            'special' => 'No',
            'activate' => 'Yes',
            'type' => 'Veg',
            'slider' => 'Yes',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );

        DB::table('foods')->insert([
            'name' => 'American Fried Chicken',
            'details' => 'Chicken drumstick marinated with chilli fakes & deep fry',
            'image' => 'food-1.jpg',
            'price' => 309,
            'special' => 'No',
            'activate' => 'Yes',
            'type' => 'Veg',
            'slider' => 'No',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );
        DB::table('foods')->insert([
            'name' => 'Tandoori Chicken',
            'details' => 'All time favourite <br> <b>Test<b>',
            'image' => 'food-2.jpg',
            'price' => 409,
            'special' => 'Yes',
            'activate' => 'Yes',
            'type' => 'Non-Veg',
            'slider' => 'No',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );
        DB::table('foods')->insert([
            'name' => 'Barbequed Chicken Wings',
            'details' => 'Skewered tangy grilled chicken wing',
            'image' => 'food-3.jpg',
            'price' => 309,
            'special' => 'Yes',
            'activate' => 'Yes',
            'type' => 'Veg',
            'slider' => 'Yes',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );
        DB::table('foods')->insert([
            'name' => 'Chicken Cheese Fried Blues',
            'details' => 'Breast of chicken stuffed with mozzarella cheeseg',
            'image' => 'food-4.jpg',
            'price' => 249,
            'special' => 'Yes',
            'activate' => 'Yes',
            'type' => 'Veg',
            'slider' => 'Yes',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );
        DB::table('foods')->insert([
            'name' => 'CChicken Cheese Pikada',
            'details' => 'Chicken marinated in cheese, oregano and olive oil and cooked in day oven',
            'image' => 'food-1.jpg',
            'price' => 249,
            'special' => 'No',
            'activate' => 'Yes',
            'type' => 'Veg',
            'slider' => 'No',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );
        DB::table('foods')->insert([
            'name' => 'Chicken Italian Kabab',
            'details' => 'Chunks of chicken marinated with rosemary, oregano and olive oil and cooked in day oven',
            'image' => 'food-1.jpg',
            'price' => 249,
            'special' => 'No',
            'activate' => 'Yes',
            'type' => 'Veg',
            'slider' => 'No',
            'likes' => 110,
            'thumbnail' => '',
            'cooking_type' => '',
                ]
        );
    }

}
