<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('methods', function(Blueprint $table)
		{
			$table->increments('mid');
                        
            $table->string('mname', 50);
			$table->unsignedInteger('ssid');
			$table->foreign('ssid')->references('ssid')->on('subsections');
			$table->string('text', 9000);

			$table->string('editable',10);
                        
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
		Schema::drop('methods');
	}

}
