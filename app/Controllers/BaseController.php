<?php namespace Starter\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

/**
 * BaseController
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class BaseController extends Controller{

	/**
	 * Helper function to share data on views
	 *
	 * @param $view
	 * @param null $data
	 */
	public function share($view, $data = null)
	{
		View::share($view, $data);
	}

} 