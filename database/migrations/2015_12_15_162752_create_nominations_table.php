<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNominationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('nominations', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable();
			$table->binary('photo')->nullable();
			$table->text('brief')->nullable();
			$table->longText('detail')->nullable();
			$table->string('link')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('nominations');
	}
}
