<?php
namespace PHPAuth\DAO;
use PHPAuth\Config;

class UserImpl implements IUser {
	private $en = include_once "bootstrap.php";

	public function save($user_data){
		$this->en->persist($user_data);
		$this->en->flush();
		
		return $user_data;
	}

	public function all(){
		$repo = $this->en->getRepository('User');
		
		return $repo->findAll();
	}

	public function find($id){
		
		return $this->en->find('User', $id);
	}

	public function find_by($key_value){
		
		return $this->en->getRepository('User')->findOneBy($key_value);
	}

	public function update($obj){
		
		$this->en->merge($obj);
		$this->en->flush();
	}

	public function delete($id){
		$model = $this->find($id);
		if($model != null) {
		
			$this->en->remove($model);
			return true;
		}
		else{
		
			return false;	
		}
		
	}
}