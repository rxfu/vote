<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Vote;

class VoteController extends Controller {

	public function getList() {
		$votes = Vote::where('is_active', '=', '1')
			->orderBy('updated_at')
			->get();

		return view('list', ['title' => '广西师范大学', 'votes' => $votes]);
	}

	public function getVote($id) {
		$vote = Vote::find($id);

		if ($vote->is_active) {
			$nominations = $vote->nominations;

			return view('vote', ['title' => $vote->title, 'vote' => $vote, 'nominations' => $nominations]);
		} else {
			return redirect('/');
		}
	}
}
