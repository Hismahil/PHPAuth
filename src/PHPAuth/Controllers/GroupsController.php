<?php

namespace PHPAuth\Controllers;

class GroupsController extends \SlimController\SlimController{

	public function indexAction(){

		$groups = new \PHPAuth\DAO\GroupImpl();
		$this->render('groups/index', array(
            'groups' => $groups->all()
        ));
	}

	public function showAction($id){
		
		$group = new \PHPAuth\DAO\GroupImpl();
		$this->render('groups/show', array(
            'group' => $group->find($id)
        ));
	}

	public function editAction($id){
		
		$groupImpl = new \PHPAuth\DAO\GroupImpl();
		$roleImpl = new \PHPAuth\DAO\RoleImpl();
		$group = $groupImpl->find($id);

		$this->render('groups/edit', array(
            'group' => $group, 'action' => "/groups/{$group->getId()}/update", 'edit_mode' => true, 'roles' => $roleImpl->all()
        ));
	}

	public function newAction(){
		
		$roleImpl = new \PHPAuth\DAO\RoleImpl();
		$this->render('groups/new', array(
            'group' => new \PHPAuth\Models\Group(), 'roles' => $roleImpl->all(), 'action' => '/groups/create', 'edit_mode' => false
        ));
	}

	public function createAction(){
		
		if(isset($_POST) && isset($_POST['commit'])){
			$group = new \PHPAuth\Models\Group();
			$roleImpl = new \PHPAuth\DAO\RoleImpl();
			$groupImpl = new \PHPAuth\DAO\GroupImpl();
			$roles_selected = $_POST['roles_selected'];

			foreach ($roles_selected as $role) {
				$group->addRole($roleImpl->find($role));
			}

			$group->initAttributes(array('name'=>$_POST['name'], 'active'=> true));
			
			if($group->isValid()) {
				$groupImpl->save($group);
				if($group->getId()) $this->redirect("/groups/{$group->getId()}");
			}
		}
		$this->redirect("/groups/new");
	}

	public function updateAction($id){
		$groupImpl = new \PHPAuth\DAO\GroupImpl();
		$roleImpl = new \PHPAuth\DAO\RoleImpl();

		$group = $groupImpl->find($id);

		if($group){
			$roles_selected = $this->app->request->put("roles_selected");
			$roles = $roleImpl->all();

			//add new roles
			foreach ($roles as $role) {
				foreach ($roles_selected as $role_selected)
					if($role->getId() == $role_selected && !$group->containRole($role)) $group->addRole($role);
			}

			//remove old roles
			foreach ($group->getRoles() as $role) {
				$isIn = true;
				foreach ($roles_selected as $role_selected) {
					if($role->getId() == $role_selected) {
						$isIn = true;
						break;
					}
					else $isIn = false;
				}

				if(!$isIn) $group->removeRole($role);
			}

			$group->setName($this->app->request->put("name"));
			$group->setActive($this->app->request->put("active"));
			if($group->isValid()) {
				$groupImpl->update($group);
				$this->redirect("/groups/{$group->getId()}");
			}
		}
		//else group not found
		
		$this->redirect("/groups");
	}	

	public function destroyAction(){
		//without implementation
		//<input type="hidden" name="_METHOD" value="DELETE"/> override method 'post'
	}
}