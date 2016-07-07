<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(PackagetableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FoodTableSeeder::class);
	$this->call(CategoryfoodTableSeeder::class);
        $this->call(FoodpackageTableSeeder::class);
        $this->call(OffersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);

        Model::reguard();
    }

}
