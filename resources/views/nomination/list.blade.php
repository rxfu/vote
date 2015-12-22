@extends('app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<div class="text-right">
				<a href="{{ url('nomination/add', $id) }}" title="添加候选"  role="button" class="btn btn-success">添加候选</a>
			</div>
		</div>
	</div>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>标题</th>
				<th>摘要</th>
				<th>照片</th>
				<th>链接</th>
				<th>投票号</th>
				<th colspan="3">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($nominations as $nomination)
				<tr>
					<td>{{ $nomination->seq }}</td>
					<td>{{ $nomination->title }}</td>
					<td>{{ $nomination->brief }}</td>
					<td>
						@if (is_null($nomination->photo))
							无图片
						@else
							<img src="{{ asset($nomination->photo) }}" title="{{ $nomination->title }}" width="150">
						@endif
					</td>
					<td>
						<a href="{{ $nomination->link }}" title="{{ $nomination->title }}">{{ $nomination->link }}</a>
					</td>
					<td>{{ $nomination->vote_id }}</td>
					<td>
						<a href="{{ url('nomination/show', $nomination->id) }}" title="查看" role="button" class="btn btn-warning">查看</a>
					</td>
					<td>
						<a href="{{ url('nomination/edit', $nomination->id) }}" title="编辑" role="button" class="btn btn-primary">编辑</a>
					</td>
					<td>
						<form action="{{ url('nomination/delete', $nomination->id) }}" method="POST" role="form" name="delete" onsubmit="return confirm('你确定要删除这条记录吗？')">
							{!! method_field('delete') !!}
							{!! csrf_field() !!}
							<button type="submit" class="btn btn-danger">删除</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop