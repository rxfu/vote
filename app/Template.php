<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model {

	protected $table = 'templates';

	public $timestamps = false;

	public function votes() {
		return $this->hasMany('App\Vote');
	}
}
