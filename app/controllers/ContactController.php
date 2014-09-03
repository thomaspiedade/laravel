<?php

class ContactController extends BaseController {

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
		return View::make('contact');
	}

	public function send(){
		$post = Input::all();
		
		//Validation rules
		$rules = array (
			'name'   => 'required|alpha',
			'email'  => 'required|email',
			'text'   => 'required|min:15'
		);
		
		//Validate post
		$validator = Validator::make ($post, $rules);

		if($validator->passes()){			
			$ContactModel        = new ContactModel;	
			$ContactModel->name  = $post['name'];
			$ContactModel->email = $post['email'];
			$ContactModel->text  = $post['text'];	
			if($ContactModel->save()){
				return Redirect::to('/contato')
						       ->with('sent'   , 1)
						       ->with('status' , 'success')
						       ->with('message', 'Contato enviado com sucesso');
			}		
		} 

		return Redirect::to('/contato')
					   ->with('sent', 1)
					   ->with('status' , 'error')
					   ->withErrors($validator);
	}

	public function show(){
		$ContactModel = new ContactModel;
		return View::make('contact-show')->with('contacts', $ContactModel->getContacts());		
	}

}