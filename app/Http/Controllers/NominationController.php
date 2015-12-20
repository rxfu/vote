<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Nomination;

class NominationController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getList($id = null) {
		if (is_null($id)) {
			$nominations = Nomination::orderBy('seq')->get();
		} else {
			$nominations = Nomination::where('vote_id', '=', $id)
				->orderBy('seq')
				->get();
		}
		return view('nomination.list', ['title' => '投票条目列表', 'nominations' => $nominations]);
	}
}
