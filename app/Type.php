<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {
	protected $table = "types";

	public $timestamps = false;

	public function voters() {
		return $this->hasMany('App\Voter');
	}
}
