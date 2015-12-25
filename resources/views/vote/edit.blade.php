@extends('app')

@section('content')
<div>
	<form action="{{ url('vote/update', $vote->id) }}" method="POST" role="form" class="form-horizontal">
		{!! method_field('put') !!}
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="title" class="col-md-2 control-label">投票名称</label>
			<div class="col-md-10">
				<input type="text" name="title" id="title" class="form-control" placeholder="投票名称" value="{{ $vote->title }}">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-md-2 control-label">投票简介</label>
			<div class="col-md-10">
				<textarea name="description" id="description" class="form-control" rows="10" placeholder="投票简介">{{ strip_tags($vote->description) }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="template" class="col-md-2 control-label">界面模板</label>
			<div class="col-md-10">
				<select class="form-control" name="template" id="template">
					@foreach ($templates as $template)
						<option value="{{ $template->id }}"{{ $template->id == $vote->template_id ? ' selected' : '' }}>{{ $template->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="limit" class="col-md-2 control-label">投票限制</label>
			<div class="col-md-10">
				<input type="text" name="limit" id="limit" class="form-control" placeholder="投票限制" value="{{ $vote->limit }}">
			</div>
		</div>
		<div class="form-group">
			<label for="is_active" class="col-md-2 control-label">是否启用</label>
			<div class="col-md-10">
				<label class="radio-inline">
					<input type="radio" name="is_active" value="1"{{ $vote->is_active == 1 ? ' checked' : '' }}>&nbsp;启用
				</label>
				<label class="radio-inline">
					<input type="radio" name="is_active" value="0"{{ $vote->is_active == 0 ? ' checked' : '' }}>&nbsp;禁用
				</label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-success" title="更新">更新</button>
			</div>
		</div>
	</form>
</div>
@stop