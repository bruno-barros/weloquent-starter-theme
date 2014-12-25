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

				@yield('main')

				@include('partials.comments.show')

			</div>

 		</div>

 	</div>


 	@include('partials.footer')

@stop