<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model {

	protected $table = 'voters';

	public function nominations() {
		return $this->belongsToMany('App\Nomination', 'ballots', 'voter_id', 'nomination_id')->withTimestamps();
	}

	public function type() {
		return $this->belongsTo('App\Type');
	}

	public function vote() {
		return $this->belongsTo('App\Vote');
	}

	public function getIpAttribute($value) {
		return long2ip($value);
	}

	public function setIpAttribute($value) {
		$this->attributes['ip'] = sprintf('%u', ip2long($value));
	}
}
