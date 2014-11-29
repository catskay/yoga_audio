<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experiences', function(Blueprint $table)
		{
			$table->increments('eid');
                        
            $table->unsignedInteger('uid');
            $table->foreign('uid')->references('uid')->on('users');

			$table->unsignedInteger('cid');
            $table->unsignedInteger('sid');

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
		Schema::drop('experiences');
	}

}
