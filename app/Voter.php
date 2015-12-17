<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model {

	protected $table = 'voters';

	public function nominations() {
		return $this->belongsToMany('App\Nomination', 'ballots', 'voter_id', 'nomination_id');
	}

	public function type() {
		return $this->belongsTo('App\Type');
	}
}
