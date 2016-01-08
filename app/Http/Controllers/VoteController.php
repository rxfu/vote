<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Template;
use App\Type;
use App\Vote;
use App\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller {

	public function __construct() {
		$this->middleware('auth', ['except' => ['getIndex', 'getVote', 'postVote', 'getStatistics', 'getChart']]);
	}

	private function nl2p($text) {
		$str = trim($text);
		$str = '<p>' . $str;
		$str = str_replace("\r\n", "</p>\n<p>", $str);
		$str = $str . "</p>\n";
		$str = str_replace("<p></p>", '', $str);
		$str = str_replace("\n", '', $str);
		$str = str_replace("</p>", "</p>\n", $str);

		return $str;
	}

	public function getIndex() {
		$votes = Vote::where('is_active', '=', '1')
			->orderBy('updated_at')
			->get();

		return view('vote.index', ['votes' => $votes]);
	}

	public function getVote(Request $request, $id) {
		$vote = Vote::find($id);

		if ($vote->is_active) {
			$nominations = $vote->nominations;
			$types       = Type::all();
			$voted       = Voter::where('vote_id', '=', $id)
				->where('ip', '=', sprintf('%u', ip2long($request->ip())))
				->count();

			return view('templates.' . $vote->template->slug, ['title' => $vote->title, 'vote' => $vote, 'nominations' => $nominations, 'types' => $types, 'voted' => $voted]);
		} else {
			return redirect('/');
		}
	}

	public function postVote(Request $request, $id) {
		$vote = Vote::find($id);

		if (!$vote->is_active) {
			return redirect('/');
		} else {
			$voted = Voter::where('vote_id', '=', $id)
				->where('ip', '=', sprintf('%u', ip2long($request->ip())))
				->count();

			if ($voted) {
				return redirect('auth/logout');
			}
		}
		$inputs = $request->all();

		$voter             = new Voter();
		$voter->ip         = $request->ip();
		$voter->name       = trim($inputs['name']);
		$voter->department = trim($inputs['department']);
		$voter->mobile     = str_replace(' ', '', $inputs['mobile']);
		$voter->type_id    = $inputs['type'];
		$voter->vote_id    = $id;

		if ($voter->save()) {
			Voter::find($voter->id)->nominations()->sync($inputs['vote']);

			return redirect('vote/statistics/' . $id)->with('status', '投票保存成功');
		} else {
			return back()->withErrors('投票保存失败');
		}
	}

	public function getList() {
		$votes = Vote::orderBy('updated_at', 'desc')->get();

		return view('vote.list', ['title' => '投票列表', 'votes' => $votes]);
	}

	public function getShow($id) {
		$vote = Vote::find($id);

		return view('vote.show', ['title' => '查看' . $vote->title, 'vote' => $vote]);
	}

	public function getAdd() {
		$templates = Template::orderBy('id')->get();

		return view('vote.add', ['title' => '添加投票', 'templates' => $templates]);
	}

	public function postSave(Request $request) {
		$inputs = $request->all();

		$vote              = new Vote();
		$vote->title       = $inputs['title'];
		$vote->description = $this->nl2p($inputs['description']);
		$vote->template_id = $inputs['template'];
		$vote->is_active   = $inputs['is_active'];
		$vote->user_id     = Auth::user()->id;

		if ($vote->save()) {
			return redirect('vote/list')->with('status', '投票添加成功');
		} else {
			return back()->withErrors('投票添加失败');
		}
	}

	public function getEdit($id) {
		$vote      = Vote::find($id);
		$templates = Template::orderBy('id')->get();

		return view('vote.edit', ['title' => '编辑' . $vote->title, 'vote' => $vote, 'templates' => $templates]);
	}

	public function putUpdate(Request $request, $id) {
		$inputs = $request->all();

		$vote              = Vote::find($id);
		$vote->title       = $inputs['title'];
		$vote->description = $this->nl2p($inputs['description']);
		$vote->template_id = $inputs['template'];
		$vote->is_active   = $inputs['is_active'];

		if ($vote->save()) {
			return redirect('vote/list')->with('status', '投票更新成功');
		} else {
			return back()->withErrors('投票更新失败');
		}
	}

	public function deleteDelete($id) {
		$vote = Vote::find($id);

		if (is_null($vote)) {
			return back()->withErrors('没有这个投票');
		} elseif ($vote->delete()) {
			return redirect('vote/list')->with('status', '投票删除成功');
		} else {
			return back()->withErrors('投票删除失败');
		}
	}

	public function getStatistics($id) {
		$vote = Vote::find($id);

		return view('vote.statistics', ['title' => $vote->title . '统计', 'id' => $id, 'nominations' => $vote->nominations]);
	}

	public function getChart($id) {
		$vote = Vote::find($id);

		$data['legend']         = $vote->title . '统计图';
		$data['series']['name'] = '票数';
		foreach ($vote->nominations as $nomination) {
			$data['categories'][]     = $nomination->title;
			$data['series']['data'][] = $nomination->voters->count();
		}

		return response()->json($data);
	}
}
