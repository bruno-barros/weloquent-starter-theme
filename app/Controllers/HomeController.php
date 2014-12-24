<?php namespace Starter\Controllers;
/**
 * HomeController
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class HomeController extends BaseController{

	/**
	 * @param array $args
	 * @param $request
	 */
	public function index($args = [], $request)
	{
		$this->share('orderDir', 'desc');
	}

} 