@extends('app')

@section('content')
<div>
	<ul class="nav nav-pills">
		<li role="presentation">
			<a href="{{ url('vote/list') }}">投票列表</a>
		</li>
		<li role="presentation">
			<a href="{{ url('auth/logout') }}">登出</a>
		</li>
	</ul>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">{{ $title }}</div>
	</div>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>投票名称</th>
				<th>投票简介</th>
				<th>是否启用</th>
				<th>模板</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($votes as $vote)
				<tr>
					<td>{{ $vote->id }}</td>
					<td>{{ $vote->title }}</td>
					<td>{{ $vote->description }}</td>
					<td>{{ $vote->is_active }}</td>
					<td>{{ $vote->template->name }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop