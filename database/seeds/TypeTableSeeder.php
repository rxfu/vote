<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('types')->truncate();

		Type::create([
			'name' => '教师',
			'slug' => 'teacher',
		]);
		Type::create([
			'name' => '学生',
			'slug' => 'student',
		]);
		Type::create([
			'name' => '校友',
			'slug' => 'alumni',
		]);
		Type::create([
			'name' => '其他社会人士',
			'slug' => 'other',
		]);
	}
}
