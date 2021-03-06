@extends('app')

@section('content')
<div>
	<ol class="list-group">
		@foreach ($votes as $vote)
			<li>
				<a href="{{ url('vote/vote', $vote->id) }}" class="list-group-item">
					<span class="badge">{{ $vote->nominations->count() }}</span>
					<h4 class="list-group-item-heading">{{ $vote->title }}</h4>
					<p class="list-group-item-text">{{ $vote->brief }}</p>
				</a>
			</li>
		@endforeach
	</ol>
</div>
@stop