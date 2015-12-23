@extends('app')

@section('content')
<div class="panel panel-default">
	<table class="table table-striped">
		<tr>
			<th class="col-md-4 text-right">标识</th>
			<td class="col-md-8 text-left">{{ $template->slug }}</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">名称</th>
			<td class="col-md-8 text-left">{{ $template->name }}</td>
		</tr>
	</table>
	<div class="col-md-offset-4 col-md-8">
		<a href="{{ url('template/edit', $template->id) }}" class="btn btn-primary" role="button" title="编辑">编辑</a>
	</div>
</div>
@stop