<?php
namespace PHPAuth\DAO;

class GroupImpl implements IGroup {

	public function __construct(){
	}

	public function save($group_data){

		\PHPAuth\Config\Bootstrap::getInstance()->em()->persist($group_data);
		\PHPAuth\Config\Bootstrap::getInstance()->em()->flush();
		
		return $group_data;
	}

	public function all(){

		$repo = \PHPAuth\Config\Bootstrap::getInstance()->em()->getRepository('PHPAuth\Models\Group');
		
		return $repo->findAll();
	}

	public function find($id){
		return \PHPAuth\Config\Bootstrap::getInstance()->em()->find('PHPAuth\Models\Group', $id);
	}

	public function find_by($key_value){
		return \PHPAuth\Config\Bootstrap::getInstance()->em()->getRepository('PHPAuth\Models\Group')->findOneBy($key_value);
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