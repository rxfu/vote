<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {

	protected $table = 'votes';

	protected $casts = [
		'is_active' => 'boolean',
	];

	public function template() {
		return $this->belongsTo('App\Template');
	}

	public function nominations() {
		return $this->hasMany('App\Nomination')->orderBy('seq');
	}

	public function voters() {
		return $this->hasMany('App\Voter');
	}
}
