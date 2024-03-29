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
		$users = $this->user->findAll();
	 	return View::make('show', array( 'users' => $users ) );
	}

	public function register(){
		//If not post show form to register
		if(!Request::isMethod('post')){ 
			return View::make('register');
		}
		
		//Get Input data
		$input = Input::all();

		//Fields to Validate		
		$post = array(
		    	'name' 					=> $input['name'],
				'email' 				=> $input['email'],
				'password' 				=> $input['password'],
				'password_confirmation' => $input['password_confirmation']
		);	

		//Validation rules
		$rules = array(
			'name'      => 'required',
			'email'     => 'required|email',
			'password'  => 'required|alpha_num|between:5,12|confirmed',
			'password_confirmation' => 'required|alpha_num|between:5,12',
		);
		
		//Validate make
		$validator = Validator::make($post, $rules);

		//Validate Data With Rules
		if( !$validator->passes() ){
			//Back if not validate passes
			 return Redirect::back()
	            ->withErrors($validator)
	            ->withInput();	
		}

		//Persistence data;
		$this->user->insert($input);

		//Redirect to success
		return Redirect::to('/list')->with('message', 'Cadastro efetuado com sucesso.');
	}

	public function edit( $id ){

		//If not post show user
		if(!Request::isMethod('post')){ 
	 		return View::make('edit', array( 'user' => $this->user->findById( $id ) ) );
		}

		//Get Input data
		$input = Input::all();

		//Fields to Validate		
		$post = array(
		    	'name' 					=> $input['name'],
				'email' 				=> $input['email'],
				'password' 				=> $input['password'],
				'password_confirmation' => $input['password_confirmation']
		);	

		//Validation rules
		$rules = array(
			'name'      => 'required',
			'email'     => 'required|email',
			'password'  => 'required|alpha_num|between:5,12|confirmed',
			'password_confirmation' => 'required|alpha_num|between:5,12',
		);
		
		//Validate make
		$validator = Validator::make($post, $rules);

		//Validate Data With Rules
		if( !$validator->passes() ){
			//Back if not validate passes
			 return Redirect::back()
	            ->withErrors($validator)
	            ->withInput();	
		}

		//Persistence data;
		$this->user->update($id, $input);

		//Redirect to success
		return Redirect::to('/list')->with('message', 'Usuário atualizado com sucesso.');
	}

	public function remove( $id ){
		$this->user->delete( $id );	
		return Redirect::to('/list')->with('message', 'Usuário removido com sucesso.');	
	}
}