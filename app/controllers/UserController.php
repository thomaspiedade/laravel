<?php
/**
 *  User Controller 
 * 
 * @author Thomás Piedade
 * @since 2014-09-02
 */

//namespace App\Controllers;
//use App\Models\User;
//use Illuminate\Routing\Controller;
class UserController extends BaseController {

	private $user;

	public function __construct(){
		$this->user = new User();
	}

	public function show(){
		//Get object array of users
	 	$this->user->findAll();
	}

	public function register(){
		//If not post show form to register
		if(!Request::isMethod('post')){ 
			return View::make('add');
		}
		
		//Get Input data
		$input = Input::all();

		//Validation rules
		$rules = array (
			'name'      => 'required|alpha',
			'email'     => 'required|email',
			'password'  => 'required|alpha_num|between:5,12|confirmed',
			'password_confirmation' => 'required|alpha_num|between:5,12',
		);

		//Validate Data
		if(!$validator->passes()){
			Redirect::to('/add')
			 		   ->with('sent', 1)
					   ->with('status' , 'error')
					   ->withErrors($validator)
					   ->withInput();			
		}

		//Persistence data;
		$this->user->insert($input));

		//Redirect to success
		return Redirect::to('/success-register');
	}
}