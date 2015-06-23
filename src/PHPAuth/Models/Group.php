<?php

namespace PHPAuth\Models;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="groups")
 */
class Group {

	/**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
	protected $id;
	/** @Column(name="role", type="string") */
	protected $name;
	/**
     * @ManyToMany(targetEntity="User", mappedBy="groups")
     **/
	protected $users;
	/**
     * @ManyToMany(targetEntity="Role", inversedBy="groups")
     * @JoinTable(name="groups_roles")
     **/
	protected $roles;
	/** @Column(name="active", type="boolean") */
	protected $active;
	/** @Column(name="created_at", type="datetime") */
	protected $created_at;
	/** @Column(name="updated_at", type="datetime") */
	protected $updated_at;

	public function __construct() {
        $this->roles = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(){
		return $this->id;
	}

	public function getCreatedAt(){
		return $this->created_at;
	}

	public function setCreatedAt($created_at){
		$this->created_at = $created_at;
	}

	public function getUpdatedAt(){
		return $this->updated_at;
	}

	public function setUpdatedAt($updated_at){
		$this->updated_at = $updated_at;
	}

	public function isActive(){
		return $this->active;
	}

	public function setActive($active){
		$this->active = $active;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getUsers(){
		return $this->users;
	}

	public function setUsers($users){
		$this->users = $users;
	}

	public function addUser($user){
		$this->users->add($user);
	}

	public function removeUser($user){
		$this->users->remove($user);
	}

	public function getRoles(){
		return $this->roles;
	}

	public function setRoles($roles){
		$this->roles = $roles;
	}

	public function addRole($role){
		$this->roles->add($role);
	}

	public function removeRole($role){
		$this->roles->remove($role);
	}

	public function initAttributes($data){
		if(isset($data['name'])) $this->name = $data['name'];
		if(isset($data['active'])) $this->active = $data['active'];
	}

	public function isValid(){
		$isValid = false;

		if($this->name != null && filter_var($this->name, FILTER_SANITIZE_STRING)) $isValid = true;

		if($isValid && $this->active != null && 
			filter_var($this->active, FILTER_VALIDATE_BOOLEAN)) $isValid = true;
		else $isValid = false;
		
		return $isValid;
	}
}