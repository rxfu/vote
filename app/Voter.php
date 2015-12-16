<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model {

	protected $table = 'voters';

	public function nominations() {
		return $this->belongsToMany('Nomination', 'ballots', 'voter_id', 'nomination_id');
	}
}
