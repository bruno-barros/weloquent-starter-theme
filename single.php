<?php
/*
Template Name: Regular page
*/
?>
@extends('layouts.post')


@section('main')


	@presenter(p, Starter\Presenters\PostPresenter, $post, true)

	<h1 class="page-title">{{ $p->title }}</h1>

	{{ $p->content }}


@stop