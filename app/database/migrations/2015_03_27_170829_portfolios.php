<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Portfolios extends Migration {

	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('portfolios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('studentid', 255);			
			$table->text('name', 255);
			$table->text('tools', 255);
			$table->text('image', 255);
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
		Schema::table('contacts', function(Blueprint $table)
		{
			Schema::drop('portfolios');
			
		});
	}
}
