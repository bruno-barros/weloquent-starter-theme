@extends( is_home() ? 'layouts.home' : 'layouts.post' )


@section('main')


	@loop

		@presenter(p, Starter\Presenters\PostPresenter)

		<h2><a href="{{ $p->permalink }}">{{ $p->title }}</a></h2>
		<small>{{ $p->date }} by <a href="{{ $p->author()->link }}">{{ $p->author()->name }}</a></small>

		@if( is_page() || is_single() )
			{{ $p->content }}
		@else
			{{ $p->excerpt }}
		@endif

	@emptyloop

		<p>404</p>

	@endloop

@stop


@section('sidebar')

	@parent

@stop