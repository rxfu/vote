<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

$factory->define(App\User::class, function (Faker\Generator $faker) {
	return [
		'name'           => $faker->name,
		'email'          => $faker->email,
		'password'       => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
	];
});

$factory->define(App\Template::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->name,
		'slug' => $faker->unique()->word,
	];
});

$factory->define(App\Vote::class, function (Faker\Generator $faker) {
	return [
		'title'       => $faker->sentence,
		'description' => $faker->paragraph,
		'is_active'   => true,
		'limit'       => $faker->randomDigit,
	];
});

$factory->define(App\Nomination::class, function (Faker\Generator $faker) {
	return [
		'title'  => $faker->sentence,
		'brief'  => $faker->paragraph,
		'detail' => $faker->text,
		'link'   => $faker->url,
	];
});
