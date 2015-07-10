<?php

namespace PHPAuth\Models;
use Doctrine\Common\Collections\ArrayCollection;
use \DateTime;

/**
 * @Entity
 * @Table(name="roles")
 */
class Role {

	/**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
	protected $id;
	/**
     * @ManyToMany(targetEntity="Group", mappedBy="roles")
     **/
	protected $groups;
	/** @Column(name="role", type="string") */
	protected $role;
	/** @Column(name="active", type="boolean") */
	protected $active;
	/** @Column(name="created_at", type="datetime") */
	protected $created_at;
	/** @Column(name="updated_at", type="datetime") */
	protected $updated_at;

	public function __construct() {
        $this->groups = new ArrayCollection();
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

	public function getGroups(){
		return $this->group;
	}

	public function setGroups($groups){
		$this->groups = $groups;
	}

	public function addGroup($group){
		$this->groups->add($group);
	}

	public function removeGroup($group){
		$this->groups->remove($group);
	}
	
	public function getRole(){
		return $this->role;
	}

	public function setRole($role){
		$this->role = $role;
	}

	public function isActive(){
		return $this->active;
	}

	public function setActive($active){
		$this->active = $active;
	}

	public function initAttributes($data){
		if(isset($data['role'])) $this->role = $data['role'];
		if(isset($data['active'])) $this->active = $data['active'];
		$this->created_at = new DateTime('now');
		$this->updated_at = new DateTime('now');
	}

	public function isValid(){
		$isValid = false;

		if($this->role != null && filter_var($this->role, FILTER_SANITIZE_STRING)) $isValid = true;
		
		if($isValid && $this->active != null && 
			filter_var($this->active, FILTER_VALIDATE_BOOLEAN)) $isValid = true;
		else $isValid = false;

		return $isValid;
	}
}