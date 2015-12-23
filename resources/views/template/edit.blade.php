@extends('app')

@section('content')
<div>
	<form action="{{ url('template/update', $template->id) }}" method="POST" role="form" class="form-horizontal">
		{!! method_field('put') !!}
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="slug" class="col-md-2 control-label">标识</label>
			<div class="col-md-10">
				<input type="text" name="slug" id="slug" class="form-control" placeholder="标识" value="{{ $template->slug }}">
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-md-2 control-label">名称</label>
			<div class="col-md-10">
				<input type="text" name="name" id="name" class="form-control" placeholder="名称" value="{{ $template->name }}">
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