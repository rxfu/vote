<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {

	protected $table = 'votes';

	public function template() {
		return $this->belongsTo('App\Template');
	}

	public function Nominations() {
		return $this->hasMany('App\Nomination');
	}
}
