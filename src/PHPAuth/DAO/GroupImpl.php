<?php
namespace PHPAuth\DAO;
use PHPAuth\Config;

class GroupImpl implements IGroup {
	private $en = include_once "bootstrap.php";

	public function save($group_data){
		$this->en->persist($group_data);
		$this->en->flush();
		
		return $group_data;
	}

	public function all(){
		$repo = $this->en->getRepository('Group');
		
		return $repo->findAll();
	}

	public function find($id){
		
		return $this->en->find('Group', $id);
	}

	public function find_by($key_value){
		
		return $this->en->getRepository('Group')->findOneBy($key_value);
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