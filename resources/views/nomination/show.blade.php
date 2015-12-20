@extends('admin')

@section('main')
<div class="panel panel-default">
	<table class="table table-striped">
		<tr>
			<th class="col-md-4 text-right">序号</th>
			<td class="col-md-8 text-left">{{ $nomination->seq }}</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">标题</th>
			<td class="col-md-8 text-left">{{ $nomination->title }}</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">摘要</th>
			<td class="col-md-8 text-left">{{ $nomination->brief }}</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">内容</th>
			<td class="col-md-8 text-left">{{ $nomination->detail }}</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">链接</th>
			<td class="col-md-8 text-left">
				@if (is_null($nomination->link))
					无链接
				@else
					<ul class="list-item-group">
						@foreach (explode('|', $nomination->link) as $url)
							<li><a href="{{ $url }}">{{ $url }}</a></li>
						@endforeach
					</ul>
				@endif
			</td>
		</tr>
		<tr>
			<th class="col-md-4 text-right">照片</th>
			<td class="col-md-8 text-left">
				@if (is_null($nomination->photo))
					无照片
				@else
					<img src="{{ $nomination->photo }}" title="{{ $nomination->title }}">
				@endif
			</td>
		</tr>
	</table>
	<div class="col-md-offset-4 col-md-8">
		<a href="{{ url('nomination/edit', $nomination->id) }}" class="btn btn-primary" role="button" title="编辑">编辑</a>
	</div>
</div>
@stop