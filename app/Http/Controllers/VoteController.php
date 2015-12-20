<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Vote;

class VoteController extends Controller {

	public function getList() {
		$votes = Vote::where('is_active', '=', '1')
			->orderBy('updated_at')
			->get();

		return view('list', ['votes' => $votes]);
	}

	public function vote($id) {
		$vote = Vote::find($id);

		if ($vote->is_active) {
			$nominations = $vote->nominations;

			return view('vote', ['nominations' => $nominations]);
		} else {
			return redirect('/');
		}
	}
}
