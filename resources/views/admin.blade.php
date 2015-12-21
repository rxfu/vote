@extends('app')

@section('content')
<div>
	<ul class="nav nav-pills">
		<li role="presentation">
			<a href="{{ url('nomination/list') }}">候选列表</a>
		</li>
		<li role="presentation">
			<a href="{{ url('vote/list') }}">投票列表</a>
		</li>
		<li role="presentation">
			<a href="{{ url('auth/logout') }}">登出</a>
		</li>
	</ul>
</div>
@yield('main')
@stop