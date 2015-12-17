<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('voters', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('ip')->unsigned()->nullable();
			$table->string('name')->nullable();
			$table->string('department')->nullable();
			$table->integer('type_id')->nullable();
			$table->string('mobile', 15)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('voters');
	}
}
