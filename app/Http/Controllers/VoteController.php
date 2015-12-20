<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Type;
use App\Vote;
use App\Voter;
use Illuminate\Http\Request;

class VoteController extends Controller {

	public function getIndex() {
		$votes = Vote::where('is_active', '=', '1')
			->orderBy('updated_at')
			->get();

		return view('vote.index', ['votes' => $votes]);
	}

	public function getVote($id) {
		$vote = Vote::find($id);

		if ($vote->is_active) {
			$nominations = $vote->nominations;
			$types       = Type::all();

			return view('templates.' . $vote->template->slug, ['title' => $vote->title, 'vote' => $vote, 'nominations' => $nominations, 'types' => $types]);
		} else {
			return redirect('/');
		}
	}

	public function postVote(Request $request, $id) {
		$inputs = $request->all();

		$voter             = new Voter();
		$voter->ip         = $voter->aton($request->ip());
		$voter->name       = trim($inputs['name']);
		$voter->department = trim($inputs['department']);
		$voter->mobile     = str_replace(' ', '', $inputs['mobile']);
		$voter->type_id    = $inputs['type'];
		$voter->vote_id    = $id;

		if ($voter->save()) {
			Voter::find($voter->id)->nominations()->sync($inputs['vote']);

			return back()->with('status', '投票保存成功');
		} else {
			return back()->withErrors('投票保存失败');
		}
	}

	public function getList() {
		$votes = Vote::orderBy('updated_at', 'desc')->get();

		return view('vote.list', ['title' => '投票列表', 'votes' => $votes]);
	}
}
