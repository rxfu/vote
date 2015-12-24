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

		App\Template::create([
			'name' => '新闻',
			'slug' => 'news',
		]);

		App\Template::find(1)->get()->each(function ($tpl) {
			$tpl->votes()->saveMany(factory(App\Vote::class, 2)->create()->each(function ($v) {
				$v->user_id = '1';
				$v->save();
				$v->nominations()->saveMany(factory(App\Nomination::class, 10)->make());
			}));
		});
	}
}
