<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Type;
use App\Vote;
use App\Voter;
use Illuminate\Http\Request;

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
			$types       = Type::all();

			return view('vote', ['title' => $vote->title, 'vote' => $vote, 'nominations' => $nominations, 'types' => $types]);
		} else {
			return redirect('/');
		}
	}

	public function postVote(Request $request) {
		$inputs = $request->all();

		$voter             = new Voter();
		$voter->ip         = $voter->aton($request->ip());
		$voter->name       = trim($inputs['name']);
		$voter->department = trim($inputs['department']);
		$voter->mobile     = str_replace(' ', '', $inputs['mobile']);
		$voter->type_id    = $inputs['type'];

		if ($voter->save()) {
			Voter::find($voter->id)->nominations()->sync($inputs['vote']);

			return back()->with('status', '投票保存成功');
		} else {
			return back()->withErrors('投票保存失败');
		}
	}
}
