<?php
/**
 * Template Name: Contact page
 */
?>
@extends('layouts.post')

@section('main')

	@loop

		@presenter(p, Weloquent\Presenters\PagePresenter)

		<h1>{{ $p->title }}</h1>

		{{ $p->content }}


		<form action="{{ url('contact/send') }}" method="post">

			<div class="form-group">
				<label for="field_name">Name</label>

				{{ Form::text('name', null, ['id' => 'field_name', 'class' => 'form-control']) }}

				@if(Session::has('errors') && Session::get('errors')->has('name'))
				<label for="field_name" class="error">{{ Session::get('errors')->first('name') }}</label>
				@endif

			</div>

			<div class="form-group">
				<label for="field_email">E-mail</label>

				{{ Form::email('email', null, ['id' => 'field_email', 'class' => 'form-control']) }}

				@if(Session::has('errors') && Session::get('errors')->has('email'))
				<label for="field_email" class="error">{{ Session::get('errors')->first('email') }}</label>
				@endif
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default btn-lg">Send message</button>
			</div>

		</form>

	@emptyloop

		<h3>Page not found.</h3>

	@endloop

@stop