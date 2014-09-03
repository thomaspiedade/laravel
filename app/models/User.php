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
	private $level = 'user';

	public function __construct(){
		$this->storage =  DB::table( $this->table );
	}
	
	public function findAll(){
		return $this->storage->get();
	}

	public function insert( $data ){
		$data['password'] = Hash::make($data['password']);
		return $this->storage->insert(
			array(
				'name' 	    => $data['name'],
				'email'	    => $data['email'],
				'level'     => $this->level,
				'password'  => Hash::make($data['password']),
				'created_at'=> date('Y-m-d h:i:s')
			)
		);

	}
	
	public function delete( $id ){
		return $this->storage->where('id','=', $id)->delete();
	}
}