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

class AdminController extends UserController {

	private $user;

	public function __construct(){

		$this->user = new Admin();
	
	}
}