<?php

use Illuminate\Database\Seeder;

class TemplateTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('templates')->truncate();
		DB::table('votes')->truncate();
		DB::table('nominations')->truncate();

		factory(App\Template::class, 5)->create()->each(function ($tpl) {
			$tpl->votes()->saveMany(factory(App\Vote::class, 2)->create()->each(function ($v) {
				$v->nominations()->saveMany(factory(App\Nomination::class, 10)->make());
			}));
		});
	}
}
