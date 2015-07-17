<?php
namespace PHPAuth\DAO;

class RoleImpl implements IRole {

	public function __construct(){
	}

	public function save($role_data){

		\PHPAuth\Config\Bootstrap::getInstance()->em()->persist($role_data);
		\PHPAuth\Config\Bootstrap::getInstance()->em()->flush();
		
		return $role_data;
	}

	public function all(){

		$repo = \PHPAuth\Config\Bootstrap::getInstance()->em()->getRepository('PHPAuth\Models\Role');
		
		return $repo->findAll();
	}

	public function find($id){

		return \PHPAuth\Config\Bootstrap::getInstance()->em()->find('PHPAuth\Models\Role', $id);
	}

	public function find_by($key_value){

		return \PHPAuth\Config\Bootstrap::getInstance()->em()->getRepository('PHPAuth\Models\Role')->findOneBy($key_value);
	}

	public function update($obj){

		\PHPAuth\Config\Bootstrap::getInstance()->em()->merge($obj);
		\PHPAuth\Config\Bootstrap::getInstance()->em()->flush();
	}

	public function delete($id){

		$model = $find($id);
		if($model != null) {
			\PHPAuth\Config\Bootstrap::getInstance()->em()->remove($model);
			return true;
		}
		else{
			
			return false;	
		}
		
	}
}