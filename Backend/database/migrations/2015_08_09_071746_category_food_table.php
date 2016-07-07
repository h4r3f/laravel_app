<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('category_food', function(Blueprint $table) {
            $table->integer('category_id')->unsigned()->index(); // the id of the bear
            $table->integer('food_id')->unsigned()->index(); // the id of the picnic that this bear is at

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_food');
    }
}
