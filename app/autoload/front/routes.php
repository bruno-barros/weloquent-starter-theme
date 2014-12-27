<?php
/**
 * -------------------------------
 * Routes
 * -------------------------------
 */
use Weloquent\Facades\Route;

add_action('brain_loaded', function ()
{

	Route::add('/', 'home', 1)->bindToMethod('Starter\Controllers\HomeController', 'index');

	/**
	 * Overwrite the main query
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

//	Route::add('/page/{num}', 'paginated_order_route', 1, array(
//		'requirements' => ['num' => '[0-9]+'],
//		'defaults'     => ['dir' => 'desc', 'num' => 1],
//		'methods'      => array('GET'),
//	))->query(function ($matches)
//	{
//		$args['orderby'] = 'date';
//		$args['order']   = $matches['dir'];
//		$args['paged']   = $matches['num'];
//
//		View::share('orderDir', 'desc');
//
//		return $args;
//	});

});
