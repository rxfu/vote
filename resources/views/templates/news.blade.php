@extends('app')

@section('content')
@if ($voted)
<script>
	alert('你已投过票，请不要重复投票！');
</script>
@endif
@if ($vote->description)
	<blockquote>
		{!! $vote->description !!}
	</blockquote>
@endif
<div>
	<?php $i = 0;?>
	<form action="{{ url('vote/vote', $vote->id) }}" method="POST" name="voteForm" id="voteForm" role="form">
		{!! csrf_field() !!}
		@foreach ($nominations as $nomination)
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<label>
							@if (!$voted)
								<input type="checkbox" name="vote[]" id="{{ $nomination->id }}" aria-label="{{ $nomination->title }}" title="投票" value="{{ $nomination->id }}">
							@endif
							{{ '#' . ++$i . '. ' . $nomination->title }}
						</label>
					</div>
				</div>
				<div class="panel-body">
					@if ($nomination->brief)
						<p>
							{{ $nomination->brief }}
						</p>
					@endif
					@if ($nomination->detail)
						<p>
							{!! $nomination->detail !!}
						</p>
					@endif
					@if ($nomination->link)
						<p>
							原文报道链接：
							<ul>
								@foreach (explode('|', $nomination->link) as $url)
									<li>
										<a href="{{ $url }}" title="{{ $nomination->title }}">{{ $url }}</a>
									</li>
								@endforeach
							</ul>
						</p>
					@endif
					@if ($nomination->photo)
						<div class="text-center">
							<img src="{{ asset($nomination->photo) }}" alt="{{ $nomination->title }}" width="600">
						</div>
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
			@if (!$voted)
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">投票</button>
				</div>
			@endif
		</div>
	</form>
</div>
@stop