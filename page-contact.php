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

                <input type="text" name="name" id="field_name" class="form-control" value="{{ set_value('name') }}"/>

                {{ form_field_error('name') }}

			</div>

			<div class="form-group">
				<label for="field_email">E-mail</label>

                <input type="email" name="email" id="field_email" class="form-control" value="{{ set_value('email') }}"/>

                {{ form_field_error('email') }}

			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default btn-lg">Send message</button>
			</div>

		</form>
        <?php Session::save() ?>

	@emptyloop

		<h3>Page not found.</h3>

	@endloop

@stop