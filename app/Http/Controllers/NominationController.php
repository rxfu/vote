<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Nomination;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NominationController extends Controller {

	private $upload = 'uploads/';

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
		return view('nomination.list', ['title' => '候选投票列表', 'id' => $id, 'nominations' => $nominations]);
	}

	public function getShow($id) {
		$nomination = Nomination::find($id);

		return view('nomination.show', ['title' => '查看' . $nomination->title, 'nomination' => $nomination]);
	}

	public function getAdd($id = null) {
		if (is_null($id)) {
			$votes = Vote::where('is_active', '=', true)->get();
		} else {
			$votes = Vote::where('id', '=', $id)->get();
		}
		return view('nomination.add', ['title' => '添加候选投票', 'votes' => $votes]);
	}

	public function postSave(Request $request) {
		$inputs = $request->all();
		$rules  = [
			'photo' => 'image',
		];
		$validator = Validator::make($inputs, $rules);

		if ($validator->passes()) {
			$nomination          = new Nomination();
			$nomination->seq     = $inputs['seq'];
			$nomination->title   = $inputs['title'];
			$nomination->brief   = $inputs['brief'];
			$nomination->detail  = $inputs['detail'];
			$nomination->link    = $inputs['link'];
			$nomination->vote_id = $inputs['vote'];

			if ($request->hasFile('photo') && $inputs['photo']->isValid()) {
				$file     = $inputs['photo'];
				$filename = time() . '.' . $file->getClientOriginalExtension();
				$file->move($this->upload, $filename);
				$nomination->photo = $this->upload . $filename;
			}

			if ($nomination->save()) {
				return redirect('nomination/list')->with('status', '候选投票添加成功');
			} else {
				return back()->withErrors('候选投票添加失败');
			}
		} else {
			return back()->withErrors($validator);
		}
	}

	public function getEdit($id) {
		$nomination = Nomination::find($id);
		$votes      = Vote::where('is_active', '=', true)->get();

		return view('nomination.edit', ['title' => '编辑' . $nomination->title, 'nomination' => $nomination, 'votes' => $votes]);
	}

	public function putUpdate(Request $request, $id) {
		$inputs = $request->all();
		$rules  = [
			'photo' => 'image',
		];
		$validator = Validator::make($inputs, $rules);

		if ($validator->passes()) {
			$nomination          = Nomination::find($id);
			$nomination->seq     = $inputs['seq'];
			$nomination->title   = $inputs['title'];
			$nomination->brief   = $inputs['brief'];
			$nomination->detail  = $inputs['detail'];
			$nomination->link    = $inputs['link'];
			$nomination->vote_id = $inputs['vote'];

			if ($request->hasFile('photo') && $inputs['photo']->isValid()) {
				$file     = $inputs['photo'];
				$filename = time() . '.' . $file->getClientOriginalExtension();
				$file->move($this->upload, $filename);
				$nomination->photo = $this->upload . $filename;
			}

			if ($nomination->save()) {
				return redirect('nomination/list')->with('status', '候选投票更新成功');
			} else {
				return back()->withErrors('候选投票更新失败');
			}
		} else {
			return back()->withErrors($validator);
		}
	}

	public function deleteDelete($id) {
		$nomination = Nomination::find($id);

		if (is_null($nomination)) {
			return back()->withErrors('没有这个候选投票');
		} elseif ($nomination->delete()) {
			return redirect('nomination/list')->with('status', '候选投票删除成功');
		} else {
			return back()->withErrors('候选投票删除失败');
		}
	}
}
