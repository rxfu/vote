<?php

namespace App;

use App\Template;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model {

	protected $table = 'votes';

	public function template() {
		return $this->belongsTo('Template');
	}

	public function Nominations() {
		return $this->hasMany('Nomination');
	}
}
