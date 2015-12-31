<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nomination extends Model {

	use SoftDeletes;

	protected $table = 'nominations';

	public function vote() {
		return $this->belongsTo('App\Vote');
	}

	public function voters() {
		return $this->belongsToMany('App\Voter', 'ballots', 'nomination_id', 'voter_id')->withTimestamps();
	}
}
