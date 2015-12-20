@extends('app')

@section('content')
<div class="well">
	<p>{{ $vote->description }}</p>
</div>

<div>
	<?php $i = 0;?>
	<form>
		@foreach ($nominations as $nomination)
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title">
						<label>
							<input type="checkbox" name="{{ $nomination->vote_id }}" id="{{ $nomination->id }}" aria-label="{{ $nomination->title }}" title="投票"> {{ '#' . ++$i . '. ' . $nomination->title }}
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
		<div class="col-md-offset-5 col-md-2">
			<button type="submit" class="btn btn-primary btn-block">投票</button>
		</div>
	</form>
</div>
@stop