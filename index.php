@extends( is_home() ? 'layouts.home' : 'layouts.post' )


@section('main')


	@loop

		@presenter(p, Starter\Presenters\PostPresenter)

		<h2><a href="{{ $p->permalink }}">{{ $p->title }}</a></h2>
		<small>{{ $p->date }} by {{ $p->author()->name }}</small>
		{{ $p->excerpt }}

	@emptyloop

		<p>404</p>

	@endloop

@stop


@section('sidebar')

	@parent

@stop