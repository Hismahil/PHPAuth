<?php

namespace PHPAuth\Controllers;

class UsersController extends \SlimController\SlimController{

	public function indexAction(){
		$users = new \PHPAuth\DAO\UserImpl();
		$this->render('users/index', array(
            'users' => $users->all()
        ));
	}

	public function showAction($id){
		$user = new \PHPAuth\DAO\UserImpl();
		$this->render('users/show', array(
            'user' => $user->find($id)
        ));
	}

	public function editAction($id){
		$userImpl = new \PHPAuth\DAO\UserImpl();
		$group = new \PHPAuth\DAO\GroupImpl();
		$user = $userImpl->find($id);

		$this->render('users/edit', array(
            'user' => $user, 'groups' => $group->all(), 'action' => "/users/{$user->getId()}/update", 'edit_mode' => true, 'newer' => false
        ));
	}

	public function newAction(){
		$groups = new \PHPAuth\DAO\GroupImpl();
		$this->render('users/new', array(
            'user' => new \PHPAuth\Models\User(), 'groups' => $groups->all(), 'action' => '/users/create', 'edit_mode' => false, 'newer' => true
        ));
	}

	public function createAction(){
		if(isset($_POST) && isset($_POST['commit'])){

			if($_POST['password'] == $_POST['passconfirm']){
				$user = new \PHPAuth\Models\User();
				$groupImpl = new \PHPAuth\DAO\GroupImpl();
				$userImpl = new \PHPAuth\DAO\UserImpl();
				$groups_selected = $_POST['groups_selected'];

				foreach ($groups_selected as $id) {
					$user->addGroup($groupImpl->find($id));
				}

				$user->initAttributes(array('username'=>$_POST['username'], 'active'=> true, 'password' => $_POST['password']));
				
				if($user->isValid()) {
					$userImpl->save($user);
					if($user->getId()) $this->redirect("/users/{$user->getId()}");
				}	
			}
			//else msg: password and password confirmation not match
		}
		$this->redirect("/users/new");
	}

	public function updateAction($id){
		
		$userImpl = new \PHPAuth\DAO\UserImpl();
		$groupImpl = new \PHPAuth\DAO\GroupImpl();
		$user = $userImpl->find($id);

		if($user){
			$groups_selected = $this->app->request->put("groups_selected");
			$groups = $groupImpl->all();

			//add new groups
			foreach ($groups as $group) {
				foreach ($groups_selected as $group_selected)
					if($group->getId() == $group_selected && !$user->containGroup($group)) $user->addGroup($group);
			}

			//remove old group
			foreach ($user->getGroups() as $group) {
				$isIn = true;
				foreach ($groups_selected as $group_selected) {
					if($group->getId() == $group_selected) {
						$isIn = true;
						break;
					}
					else $isIn = false;
				}

				if(!$isIn) $user->removeGroup($group);
			}

			$user->initAttributes(array('username' => $this->app->request->put("username"), 'active'=> $this->app->request->put("active"), 'password' => $this->app->request->put("password")));
			
			if($user->isValid()) {
				$userImpl->update($user);
				$this->redirect("/users/{$user->getId()}");
			}
		}
		//else user not found
		
		$this->redirect("/users");
	}	

	public function destroyAction(){
		//without implementation
		//<input type="hidden" name="_METHOD" value="DELETE"/> override method 'post'
	}

	public function login(){
		
	}

	public function logout(){
		
	}
}