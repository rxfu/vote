@extends('app')

@section('content')
<div>
	<form action="{{ url('template/save') }}" method="POST" role="form" class="form-horizontal">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="slug" class="col-md-2 control-label">标识</label>
			<div class="col-md-10">
				<input type="text" name="slug" id="slug" class="form-control" placeholder="标识">
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-md-2 control-label">名称</label>
			<div class="col-md-10">
				<input type="text" name="name" id="name" class="form-control" placeholder="名称">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-success" title="添加">添加</button>
			</div>
		</div>
	</form>
</div>
@stop