<?php namespace Starter\Controllers;

use Illuminate\Support\Facades\View;

/**
 * BaseController
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class BaseController {

	/**
	 * Helper function to share data on views
	 *
	 * @param $view
	 * @param null $data
	 */
	public function share($view, $data = null)
	{
		View::make($view, $data);
	}

} 