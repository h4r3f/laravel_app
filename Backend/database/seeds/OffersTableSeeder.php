<?php

use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('offers')->insert([
            'name' => '30% off Offer',
            'details' => 'This is a special offer',
            'image' => 'offer-1.jpg',
            'cuponcode' => 'KJ2500',
            'activate' => 'Yes',
            'price' => 30,
            'type' => 'Percentage',
            'minimum' => 5000,
                ]
        );
        DB::table('offers')->insert([
            'name' => 'Special Flat Offer',
            'details' => 'This is flat offer on minimum purchase 1000',
            'image' => 'offer-2.jpg',
            'cuponcode' => 'ILJ2500',
            'activate' => 'Yes',
            'price' => 100,
            'type' => 'Flat',
            'minimum' => 1000,
                ]
        );
        DB::table('offers')->insert([
            'name' => 'Friday Offer',
            'details' => 'This is only available in friday',
            'image' => 'offer-3.jpg',
            'cuponcode' => 'ALJ2500',
            'activate' => 'Yes',
            'price' => 250,
            'type' => 'Flat',
            'minimum' => 2563,
                ]
        );
    }

}
