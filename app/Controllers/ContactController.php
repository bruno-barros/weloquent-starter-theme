<?php  namespace Starter\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Starter\Controllers\BaseController as BC;


/**
 * ContactController
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class ContactController extends BC{


	/**
	 * Receive the POST from the form
	 */
	public function postSend()
	{

		$fields = Input::all();
        Session::flash('fields', $fields);

        /**
		 * @link http://laravel.com/docs/4.2/validation
		 */
		$validator = Validator::make(
			$fields,
			array(
				'name' => 'required',
				'email' => 'required|email'
			)
		);

		/**
		 * if fails save error messages and redirect back
		 */
		if($validator->fails())
		{
			Session::flash('errors', $validator->messages());

			Redirect::back();
		}

		Redirect::to('contact');
	}

}