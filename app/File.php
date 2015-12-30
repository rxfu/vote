<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

	protected $table = 'files';

	public function nomination() {
		return $this->belongsTo('App\Nomination');
	}
}
