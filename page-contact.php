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

@dd(Session::all())

		<form action="{{ url('contact/send') }}" method="post">

			<div class="form-group">
				<label for="field_name">Name</label>
				<input id="field_name" name="name" class="form-control" type="text"/>
			</div>

			<div class="form-group">
				<label for="field_email">E-mail</label>
				<input id="field_email" name="email" class="form-control" type="email"/>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default btn-lg">Send message</button>
			</div>

		</form>

	@emptyloop

		<h3>Page not found.</h3>

	@endloop

@stop