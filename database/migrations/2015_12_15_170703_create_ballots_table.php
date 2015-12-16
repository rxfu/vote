<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBallotsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('ballots', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('voter_id')->unsigned();
			$table->integer('nomination_id')->unsigned();
			$table->timestamps();

			$table->foreign('voter_id')->references('id')->on('voters')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('nomination_id')->references('id')->on('nominations')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('ballots');
	}
}
