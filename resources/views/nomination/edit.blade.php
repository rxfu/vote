@extends('admin')

@section('main')
<div>
	<form action="{{ url('nomination/update', $nomination->id) }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
		{!! method_field('put') !!}
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="seq" class="col-md-2 control-label">序号</label>
			<div class="col-md-10">
				<input type="text" name="seq" id="seq" class="form-control" placeholder="序号" value="{{ $nomination->seq }}">
			</div>
		</div>
		<div class="form-group">
			<label for="title" class="col-md-2 control-label">标题</label>
			<div class="col-md-10">
				<input type="text" name="title" id="title" class="form-control" placeholder="标题" value="{{ $nomination->title }}">
			</div>
		</div>
		<div class="form-group">
			<label for="brief" class="col-md-2 control-label">摘要</label>
			<div class="col-md-10">
				<textarea name="brief" id="brief" class="form-control" rows="10" placeholder="摘要" value="{{ $nomination->brief }}"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="detail" class="col-md-2 control-label">内容</label>
			<div class="col-md-10">
				<textarea name="detail" id="detail" class="form-control" rows="10" placeholder="内容" value="{{ $nomination->detail }}"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="link" class="col-md-2 control-label">链接</label>
			<div class="col-md-10">
				<input type="text" name="link" id="link" class="form-control" placeholder="链接" value="{{ $nomination->link }}">
			</div>
		</div>
		<div class="form-group">
			<label for="photo" class="col-md-2 control-label">图片</label>
			<div class="col-md-10">
				<img src="{{ asset($nomination->photo) }}" alt="{{ $nomination->title }}" width="150">
				<input type="file" name="photo" id="photo" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="vote" class="col-md-2 control-label">投票名</label>
			<div class="col-md-10">
				<select class="form-control" name="vote" id="vote">
					@foreach ($votes as $vote)
						<option value="{{ $vote->id }}"{{ $vote->id == $nomination->vote_id ? ' selected' : '' }}>{{ $vote->title }}</option>
					@endforeach
				</select>
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