<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class VoteController extends Controller {
	public function getIndex() {
		$vote = Vote::where('is_active', '=', '1')->firstOrFail();

		return view('vote', ['vote' => $vote]);
	}
}
