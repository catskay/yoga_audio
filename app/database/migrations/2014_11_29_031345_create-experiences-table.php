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
			$table->engine = 'InnoDB';
			
			$table->increments('eid');

			$table->string('ename',100);
			$table->string('notes',1000);
			$table->date('date');
                        
            $table->unsignedInteger('uid');
            $table->foreign('uid')->references('uid')->on('users');

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
