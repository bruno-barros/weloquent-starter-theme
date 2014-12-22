<?php
/**
 * -------------------------------
 * Routes
 * -------------------------------
 */
use Weloquent\Facades\Route;

add_action('brain_loaded', function ()
{

	Route::add('/')->bindToMethod('Starter\Controllers\HomeController', 'index');

	/**
	 * Overwrite the main query
	 */
	Route::add('/order/{dir}', 'order_route', 1, array(
		'requirements' => ['dir' => 'asc|desc'],
		'defaults'     => ['dir' => 'asc'],
		'methods'      => array('GET'),
	))->query(function ($matches)
	{
		$args['orderby'] = 'date';
		$args['order']   = $matches['dir'];

		return $args;
	});

});
