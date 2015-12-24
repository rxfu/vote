@extends('app')

@section('content')
<div class="panel panel-default">
	<table class="table table-striped">
		<tr>
			<th class="col-md-4 text-right">投票名称</th>
			<td class="col-md-8 text-left">{{ $vote->title }}</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">投票简介</th>
			<td class="col-md-8 text-left">{{ $vote->description }}</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">界面模板</th>
			<td class="col-md-8 text-left">{{ $vote->template->name }}</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">是否启用</th>
			<td class="col-md-8 text-left">{{ $vote->is_active ? '是' : '否' }}</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">创建者</th>
			<td class="col-md-8 text-left">{{ $vote->user->username }}</td>
		</tr>
	</table>
	<div class="col-md-offset-4 col-md-8">
		<a href="{{ url('vote/edit', $vote->id) }}" class="btn btn-primary" role="button" title="编辑">编辑</a>
	</div>
</div>
@stop