<?php

class PaymentsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function store()
	{
		$data = Input::all();

		Payment::add($data);

		return Response::json(true);
	}


	public function confirm(){

		$amount = Input::get('amount');
		$phone = Input::get('phone');

		$payment = Payment::confirmPayment($phone, $amount);
		if($payment){

			Payment::activateUser($phone);

			return Response::json(array('success' => true));

		} else {

			

			return Response::json(array('success' => false));

		}
		
	}

}
