<?php
/**
 * -------------------------------
 * Routes
 * -------------------------------
 */
use Weloquent\Facades\Route;

/**
 * Bind a class to home path
 * Using App::mak() will you will get dependency injection by Laravel
 */
Route::add('/', 'home', 1)->bindToMethod(App::make('Starter\Controllers\HomeController'), 'index');

/**
 * Overwrite the main query to order posts
 */
Route::add('/order/{dir}', 'order_route', 1, [
	'requirements' => ['dir' => 'asc|desc'],
	'defaults'     => ['dir' => 'desc'],
	'methods'      => array('GET'),
])->query(function ($matches)
{
	$args['orderby'] = 'date';
	$args['order']   = $matches['dir'];

	share('orderDir', $matches['dir']);

	return $args;
});

/**
 * Pagination order
 */
Route::add('/order/{dir}/page/{num}', 'paged_order_route', 2, [
	'requirements' => ['dir' => 'asc|desc', 'num' => '[0-9]+'],
	'defaults'     => ['dir' => 'desc', 'num' => 1],
	'methods'      => array('GET'),
])->query(function ($matches)
{
	$args['orderby'] = 'date';
	$args['order']   = $matches['dir'];
	$args['paged']   = $matches['num'];

	share('orderDir', $matches['dir']);

	return $args;
});

/**
 * Intercept POST method
 */
Route::add('/contact/send', 'post_contact')
	->methods(['POST'])
	->bindToMethod(App::make('Starter\Controllers\ContactController'), 'postSend');
