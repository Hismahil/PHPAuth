<?php
namespace PHPAuth\DAO;

require_once "../src/PHPAuth/Models/Role.php";

class RoleImpl implements IRole {
	
	private $em;

	public function __construct(){
		require_once "../bootstrap.php";
		$this->em = $entityManager;
	}

	public function save($role_data){
		
		$this->em->persist($role_data);
		$this->em->flush();
		
		return $role_data;
	}

	public function all(){
		
		$repo = $this->em->getRepository('PHPAuth\Models\Role');
		
		return $repo->findAll();
	}

	public function find($id){
		
		return $this->em->find('PHPAuth\Models\Role', $id);
	}

	public function find_by($key_value){
		
		return $this->em->getRepository('PHPAuth\Models\Role')->findOneBy($key_value);
	}

	public function update($obj){
		
		$this->em->merge($obj);
		$this->em->flush();
	}

	public function delete($id){

		$model = $this->find($id);
		if($model != null) {
			require_once "../bootstrap.php";	
			$this->em->remove($model);
			return true;
		}
		else{
			
			return false;	
		}
		
	}
}