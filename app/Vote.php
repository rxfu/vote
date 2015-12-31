<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model {

	use SoftDeletes;

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

	public function user() {
		return $this->belongsTo('App\User');
	}
}
