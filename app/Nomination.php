<?php

namespace App;

use App\Vote;
use Illuminate\Database\Eloquent\Model;

class Nomination extends Model {

	protected $table = 'nominations';

	public function vote() {
		return $this->belongsTo('Vote');
	}

	public function voters() {
		return $this->belongsToMany('Voter', 'ballots', 'nomination_id', 'voter_id');
	}
}
