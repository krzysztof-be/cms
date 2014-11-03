<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kkstudio_notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('context');
			$table->string('message');
			$table->string('icon');
			$table->enum('status', [ 'read', 'unread']);
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
		Schema::drop('kkstudio_notifications');
	}

}
