<?php
namespace PHPAuth\DAO;
use PHPAuth\Config;

class SessionImpl implements ISession {
	
	private $em;

	public function __construct(){
		
		$this->em = $entityManager;
	}

	public function save($session_data){
		$this->em->persist($session_data);
		$this->em->flush();
		
		return $session_data;
	}

	public function all(){
		$repo = $this->em->getRepository('PHPAuth\Models\Session');
		
		return $repo->findAll();
	}

	public function find($id){
		
		return $this->em->find('PHPAuth\Models\Session', $id);
	}

	public function find_by($key_value){
		
		return $this->em->getRepository('PHPAuth\Models\Session')->findOneBy($key_value);
	}

	public function update($obj){
		
		$this->em->merge($obj);
		$this->em->flush();
	}

	public function delete($id){
		$model = $this->find($id);
		if($model != null) {
			
			$this->em->remove($model);
			return true;
		}
		else{
			
			return false;	
		}
		
	}
}