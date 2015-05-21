<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->text('photo', 255);
			$table->text('username', 255);
			$table->text('nickname', 255);
			$table->text('phone', 255);
			$table->text('address', 255);
			$table->text('hometown', 255);
			$table->text('work', 255);
			$table->text('company', 255);
			$table->integer('webdesign' )->default(1);
			$table->integer('graphicdesign' )->default(1);
			$table->integer('illustration' )->default(1);
			$table->integer('threedmodel' )->default(1);
			$table->integer('branding' )->default(1);
			$table->integer('photography' )->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			Schema::drop('users');
		});
	}

}
