<?php

class RegisterController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/contato', 'HomeController@showWelcome');
	|
	*/


	public function index()
	{
		return View::make('signup');
	}


	public function singUp(){
		return View::make('signup');
	}

	public function send(){
		$post = Input::all();
		
		//Validation rules
		$rules = array (
			'name'   => 'required|alpha',
			'email'  => 'required|email'
		);
		
		//Validate post
		$validator = Validator::make ($post, $rules);

		if($validator->passes()){			
			$User        = new User;	
			$User->name  = $post['name'];
			$User->email = $post['email'];
			if($User->save()){
				return Redirect::to('/cadastro')
						       ->with('sent'   , 1)
						       ->with('status' , 'success')
						       ->with('message', 'Contato enviado com sucesso');
			}		
		} 

		return Redirect::to('/cadastro')
					   ->with('sent', 1)
					   ->with('status' , 'error')
					   ->withErrors($validator);
	}

	public function show(){
		//$ContactModel = new ContactModel;
		//return View::make('contact-show')->with('contacts', $ContactModel->getContacts());		
	}

}