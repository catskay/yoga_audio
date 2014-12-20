<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
<<<<<<< Updated upstream
		
		Schema::create('categories', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			
=======
		Schema::create('categories', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
>>>>>>> Stashed changes
			$table->increments('cid');

			$table->string('cname',50);

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
		Schema::drop('categories');
	}

}
