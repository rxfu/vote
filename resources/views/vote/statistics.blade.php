@extends('admin')

@section('main')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{ $title }}</div>
	</div>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>候选票标题</th>
				<th>票数</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0?>
			@foreach ($nominations as $nomination)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $nomination->seq }}. {{ $nomination->title }}</td>
					<td>{{ $nomination->voters()->count() }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop