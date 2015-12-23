<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Voter;

class VoterController extends Controller {

	protected $table = "voters";

	public function __construct() {
		$this->middleware('auth');
	}

	public function getList($id) {
		$voters = Voter::where('vote_id', '=', $id)
			->orderBy('created_at')
			->get();

		return view('voter.list', ['title' => '投票者列表', 'voters' => $voters]);
	}
}
