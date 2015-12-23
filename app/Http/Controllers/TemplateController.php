<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller {

	protected $table = "templates";

	public function __construct() {
		$this->middleware('auth');
	}

	public function getList() {
		$templates = Template::all();

		return view('template.list', ['title' => '模板列表', 'templates' => $templates]);
	}

	public function getShow($id) {
		$template = Template::find($id);

		return view('template.show', ['title' => '查看' . $template->name, 'template' => $template]);
	}

	public function getAdd() {
		return view('template.add', ['title' => '添加模板']);
	}

	public function postSave(Request $request) {
		$inputs = $request->all();

		$rules = [
			'slug' => 'required|unique:templates',
			'name' => 'required',
		];

		$validator = Validator::make($inputs, $rules);

		if ($validator->passes()) {
			$template       = new Template();
			$template->slug = $inputs['slug'];
			$template->name = $inputs['name'];

			if ($template->save()) {
				return redirect('template/list')->with('status', '模板添加成功');
			} else {
				return back()->withErrors('模板添加失败');
			}
		} else {
			return back()->withErrors($validator);
		}
	}

	public function getEdit($id) {
		$template = Template::find($id);

		return view('template.edit', ['title' => '编辑' . $template->name, 'template' => $template]);
	}

	public function putUpdate(Request $request, $id) {
		$inputs = $request->all();

		$rules = [
			'slug' => 'required',
			'name' => 'required',
		];

		$validator = Validator::make($inputs, $rules);

		if ($validator->passes()) {
			$template       = Template::find($id);
			$template->slug = $inputs['slug'];
			$template->name = $inputs['name'];

			if ($template->save()) {
				return redirect('template/list')->with('status', '模板更新成功');
			} else {
				return back()->withErrors('模板更新失败');
			}
		} else {
			return back()->withErrors($validator);
		}
	}

	public function deleteDelete($id) {
		$template = Template::find($id);

		if (is_null($template)) {
			return back()->withErrors('没有这个模板');
		} elseif ($template->delete()) {
			return redirect('template/list')->with('status', '模板删除成功');
		} else {
			return back()->withErrors('模板删除失败');
		}
	}
}
