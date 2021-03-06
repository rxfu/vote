<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLinksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('links', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('url');
			$table->integer('nomination_id')->unsigned();
			$table->timestamps();

			$table->foreign('nomination_id')->references('id')->on('nominations')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('links');
	}
}
