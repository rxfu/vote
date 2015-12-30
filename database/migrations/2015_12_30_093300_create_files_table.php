<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('files', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('path');
			$table->string('type');
			$table->string('mime')->nullable();
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
		Schema::drop('files');
	}
}
