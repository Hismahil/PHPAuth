<?php
namespace PHPAuth\DAO;
use PHPAuth\Config;

class SessionImpl implements ISession {
	private $en = include_once "bootstrap.php";

	public function save($session_data){
		$this->en->persist($session_data);
		$this->en->flush();
		
		return $session_data;
	}

	public function all(){
		$repo = $this->en->getRepository('Session');
		
		return $repo->findAll();
	}

	public function find($id){
		
		return $this->en->find('Session', $id);
	}

	public function find_by($key_value){
		
		return $this->en->getRepository('Session')->findOneBy($key_value);
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