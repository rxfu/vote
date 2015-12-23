@extends('app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{ $title }}投票者列表</div>
	</div>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>IP地址</th>
				<th>姓名</th>
				<th>单位</th>
				<th>身份</th>
				<th>联系电话</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0?>
			@foreach ($voters as $voter)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $voter->ip }}</td>
					<td>{{ $voter->name }}</td>
					<td>{{ $voter->department }}</td>
					<td>{{ $voter->type->name }}</td>
					<td>{{ $voter->mobile }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop