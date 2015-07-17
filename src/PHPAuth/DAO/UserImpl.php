<?php
namespace PHPAuth\DAO;
use PHPAuth\Config;

class UserImpl implements IUser {
	
	public function save($user_data){
		\PHPAuth\Config\Bootstrap::getInstance()->em()->persist($user_data);
		\PHPAuth\Config\Bootstrap::getInstance()->em()->flush();
		
		return $user_data;
	}

	public function all(){
		$repo = \PHPAuth\Config\Bootstrap::getInstance()->em()->getRepository('PHPAuth\Models\User');
		
		return $repo->findAll();
	}

	public function find($id){
		
		return \PHPAuth\Config\Bootstrap::getInstance()->em()->find('PHPAuth\Models\User', $id);
	}

	public function find_by($key_value){
		
		return \PHPAuth\Config\Bootstrap::getInstance()->em()->getRepository('PHPAuth\Models\User')->findOneBy($key_value);
	}

	public function update($obj){
		
		\PHPAuth\Config\Bootstrap::getInstance()->em()->merge($obj);
		\PHPAuth\Config\Bootstrap::getInstance()->em()->flush();
	}

	public function delete($id){
		$model = $this->find($id);
		if($model != null) {
		
			\PHPAuth\Config\Bootstrap::getInstance()->em()->remove($model);
			return true;
		}
		else{
		
			return false;	
		}
		
	}
}