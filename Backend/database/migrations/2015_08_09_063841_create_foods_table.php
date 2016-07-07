<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('foods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('details');
			$table->text('image');
			$table->bigInteger('price');
			$table->string('special');
			$table->string('activate');
			$table->string('type');
 			$table->text('slider', 220);
			$table->bigInteger('likes');
  			$table->text('thumbnail');
			$table->text('cooking_type');
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
		Schema::drop('foods');
	}

}
