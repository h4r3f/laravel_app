<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartPackagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cartpackages', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->integer('cart_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('cart_id')->references('id')->on('carts');
 	    $table->integer('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cartitems');
    }

}
