<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Voter extends Model {

	protected $table = 'voters';

	public function nominations() {
		return $this->belongsToMany('App\Nomination', 'ballots', 'voter_id', 'nomination_id')->withTimestamps();
	}

	public function type() {
		return $this->belongsTo('App\Type');
	}

	public function aton($ip) {
		return DB::raw("INET_ATON('$ip')");
	}

	public function vote() {
		return $this->belongsTo('App\Vote');
	}
}
