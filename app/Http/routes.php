<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
	return redirect('vote/index');
});

Route::controllers([
	'auth'       => 'Auth\AuthController',
	'password'   => 'Auth\PasswordController',
	'vote'       => 'VoteController',
	'nomination' => 'NominationController',
	'template'   => 'TemplateController',
	'voter'      => 'VoterController',
]);
