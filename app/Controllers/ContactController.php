<?php  namespace Starter\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Starter\Controllers\BaseController as BC;
use Illuminate\Support\Facades\Input;
use Weloquent\Facades\Route;


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

//		dd(Redirect::to('contact'));
		if($validator->fails())
		{
//			$messages = $validator->messages();
//			dd($messages->first('email'));
//			share('errors', $messages);

//			return Redirect::away('contact')->withErrors($validator);
		}

//		dd(\App::getFacadeApplication()['session.store']);

//		dd(Session::getId());

		Session::put('errors', 'value');
		wp_redirect( url('contact'), 302 );
		exit;

//		return Redirect::to('contact');
	}

}