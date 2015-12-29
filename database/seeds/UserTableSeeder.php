<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->truncate();

		User::create([
			'username'       => 'admin',
			'email'          => str_random(10) . '@gmail.com',
			'password'       => bcrypt('admin888'),
			'is_super'       => true,
			'is_active'      => true,
			'remember_token' => str_random(10),
		]);
	}
}
