@if( is_home() )
	@extends('layouts.home')
@else
	@extends('layouts.post')
@endif


@section('main')

	@loop

		@presenter(p, Starter\Presenters\PostPresenter)

		<h2><a href="{{ $p->permalink }}">{{ $p->title }}</a></h2>

		{{ the_content() }}

	@emptyloop

		<p>404</p>

	@endloop

@stop


@section('sidebar')

	@parent

@stop