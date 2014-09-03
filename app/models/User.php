<?php
/**
 *  User Model 
 * 
 * @author Thomás Piedade
 * @since 2014-09-02
 */

//namespace App\Models;
//use Illuminate\Auth\UserInterface;
//use Illuminate\Auth\Reminders\RemindableInterface;

class User{

	private $table = 'users';
	private $storage;

	public function __construct(){
		$this->storage =  DB::table( $this->table );
	}
	
	public function findAll(){
		return $this->storage->get();
	}

	public function insert( $data ){

	}
}