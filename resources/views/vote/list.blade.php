@extends('admin')

@section('main')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<div class="text-right">
				<a href="{{ url('vote/add') }}" title="添加投票"  role="button" class="btn btn-success">添加投票</a>
			</div>
		</div>
	</div>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>投票名称</th>
				<th>是否启用</th>
				<th colspan="4">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($votes as $vote)
				<tr>
					<td>{{ $vote->id }}</td>
					<td>
						<a href="{{ url('nomination/list', $vote->id) }}" title="{{ $vote->title }}">{{ $vote->title }}</a>
					</td>
					<td>{{ $vote->is_active ? '是' : '否' }}</td>
					<td>
						<a href="{{ url('vote/statistics', $vote->id) }}" title="统计" role="button" class="btn btn-warning">统计</a>
					</td>
					<td>
						<a href="{{ url('vote/show', $vote->id) }}" title="查看" role="button" class="btn btn-warning">查看</a>
					</td>
					<td>
						<a href="{{ url('vote/edit', $vote->id) }}" title="编辑" role="button" class="btn btn-primary">编辑</a>
					</td>
					<td>
						<form action="{{ url('vote/delete', $vote->id) }}" method="POST" role="form" name="delete" onsubmit="return confirm('你确定要删除这条记录吗？')">
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