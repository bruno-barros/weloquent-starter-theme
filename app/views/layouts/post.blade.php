@extends('master')

{{-- Post page structure --}}

@section('body_middle')

 	@include('partials.header')

 	<div class="container">

 		<div class="row">

 			<div class="col-sm-4">

				@section('sidebar')

					<?php dynamic_sidebar(); ?>

                @show

 			</div>

 			<div class="col-sm-8">

                @include('partials.breadcrumb')

				@if(post_password_required())

					{{ get_the_password_form() }}

				@else

					@yield('main')

				@endif

				{{ \Weloquent\Support\Pagination::render() }}

				@if(is_single())

					@include('partials.comments.show')

				@endif

			</div>

 		</div>

 	</div>


 	@include('partials.footer')

@stop
