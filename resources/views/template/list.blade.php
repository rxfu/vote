@extends('app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<div class="text-right">
				<a href="{{ url('template/add') }}" title="添加模板"  role="button" class="btn btn-success">添加模板</a>
			</div>
		</div>
	</div>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>标识</th>
				<th>名称</th>
				<th colspan="3">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($templates as $template)
				<tr>
					<td>{{ $template->slug }}</td>
					<td>{{ $template->name }}</td>
					<td>
						<a href="{{ url('template/show', $template->id) }}" title="查看" role="button" class="btn btn-warning">查看</a>
					</td>
					<td>
						<a href="{{ url('template/edit', $template->id) }}" title="编辑" role="button" class="btn btn-primary">编辑</a>
					</td>
					<td>
						<form action="{{ url('template/delete', $template->id) }}" method="POST" role="form" name="delete" onsubmit="return confirm('你确定要删除这条记录吗？')">
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