<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('settings')->insert([
            'name' => 'ROCOCO',
            'address' => 'London, UK',
            'image' => 'logo.png',
            'phone' => '12345678936',
            'timmings' => '11:00 AM to 11:00PM 24*7',
            'email' => 'rococo@0effortthemes.com',
            'website' => 'http://0effortthemes.com/',
	    'currencytype' => '$',
                ]
        );
    }

}
