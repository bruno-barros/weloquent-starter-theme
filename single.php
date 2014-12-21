@extends('layouts.home')

@section('main')



	@loop

		<h1 class="page-title">{{ the_title() }}</h1>


		{{ the_content() }}


	@emptyloop

		<h2>404</h2>

	@endloop


@stop