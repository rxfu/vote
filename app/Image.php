<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $table = 'images';

	public function nomination() {
		return $this->belongsTo('App\Nomination');
	}
}
