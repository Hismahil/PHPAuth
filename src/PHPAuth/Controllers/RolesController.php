<?php

namespace PHPAuth\Controllers;
use PHPAuth\Models;
use PHPAuth\DAO;

class RolesController extends \SlimController\SlimController{

	public function indexAction(){
		$roles = new \PHPAuth\DAO\RoleImpl();
		$this->render('roles/index', array(
            'roles' => $roles->all()
        ));
	}

	public function showAction($id){
		$role = new \PHPAuth\DAO\RoleImpl();
		$this->render('roles/show', array(
            'role' => $role->find($id)
        ));
	}

	public function editAction($id){
		$role = new \PHPAuth\DAO\RoleImpl();
		$this->render('roles/edit', array(
            'role' => $role->find($id)
        ));
	}

	public function newAction(){
		$this->render('roles/new', array(
            'role' => new \PHPAuth\Models\Role()
        ));
	}

	public function createAction(){
		if(isset($_POST) && isset($_POST['commit'])){
			$role = new \PHPAuth\Models\Role();
			$roleImpl = new \PHPAuth\DAO\RoleImpl();
			$role->initAttributes(array('role'=>$_POST['role'], 'active'=> true));
			if($role->isValid()) {
				$roleImpl->save($role);
				if($role->getId()) $this->redirect("/roles/{$role->getId()}");
			}
		}
		$this->redirect("/roles/new");
	}

	public function updateAction($id){
		
		$roleImpl = new \PHPAuth\DAO\RoleImpl();
		$role = $roleImpl->find($id);

		if($role){
			$role->setRole($this->app->request->put("role"));
			$role->setActive($this->app->request->put("active"));
			if($role->isValid()) {
				$roleImpl->update($role);
				$this->redirect("/roles/{$role->getId()}");
			}
		}
		//else role not found
		
		$this->redirect("/roles/index");
	}	

	public function destroyAction(){
		//without implementation
		//<input type="hidden" name="_METHOD" value="DELETE"/> override method 'post'
	}
}