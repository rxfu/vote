<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('votes', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->longText('description')->nullable();
			$table->integer('limit')->unsigned()->default(0);
			$table->integer('template_id')->unsigned();
			$table->boolean('is_active')->default(false);
			$table->integer('user_id')->unsigned();
			$table->softDeletes();
			$table->timestamps();

			$table->foreign('template_id')->references('id')->on('templates')->onUpdate('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('votes');
	}
}
