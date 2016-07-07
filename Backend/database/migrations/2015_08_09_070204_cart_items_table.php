<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cartitems', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->integer('cart_id')->unsigned();
	    $table->integer('qty');
            $table->foreign('cart_id')->references('id')->on('carts');
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
