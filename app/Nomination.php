<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model {

	protected $table = 'nominations';

	public function vote() {
		return $this->belongsTo('App\Vote');
	}

	public function voters() {
		return $this->belongsToMany('App\Voter', 'ballots', 'nomination_id', 'voter_id')->withTimestamps();
	}
}
