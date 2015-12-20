@extends('app')

@section('content')
<div class="well">
	<p>{{ $vote->description }}</p>
</div>

<div>
	<?php $i = 0;?>
	<form action="{{ url('vote/vote', $vote->id) }}" method="POST" name="voteForm" id="voteForm" role="form">
		{!! csrf_field() !!}
		@foreach ($nominations as $nomination)
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title">
						<label>
							<input type="checkbox" name="vote[]" id="{{ $nomination->id }}" aria-label="{{ $nomination->title }}" title="投票" value="{{ $nomination->id }}"> {{ '#' . ++$i . '. ' . $nomination->title }}
						</label>
					</div>
				</div>
				<div class="panel-body">
					@if (!is_null($nomination->detail))
						<p>{{ $nomination->detail }}</p>
					@endif
					@if (!is_null($nomination->link))
						<p>原文报道链接：
							<ul>
								@foreach (explode('|', $nomination->link) as $url)
									<a href="{{ $url }}" title="{{ $nomination->title }}">{{ $url }}</a>
								@endforeach
							</ul>
						</p>
					@endif
					@if (!is_null($nomination->photo))
						<img src="{{ $nomination->photo }}" alt="{{ $nomination->title }}">
					@endif
				</div>
			</div>
		@endforeach
		<div class="form-inline">
			<div class="form-group">
				<label for="name">姓名</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="姓名">
			</div>
			<div class="form-group">
				<label for="department">单位</label>
				<input type="text" name="department" id="department" class="form-control" placeholder="单位">
			</div>
			<div class="form-group">
				<label for="type">身份</label>
				<select name="type" class="form-control">
					@foreach ($types as $type)
						<option value="{{ $type->id }}">{{ $type->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="mobile">联系电话（手机）</label>
				<input type="text" name="mobile" id="mobile" class="form-control" placeholder="联系电话（手机）">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">投票</button>
			</div>
		</div>
	</form>
</div>
@stop