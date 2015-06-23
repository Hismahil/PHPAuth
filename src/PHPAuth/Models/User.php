<?php
namespace PHPAuth\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="users")
 */
class User {

	/**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
	protected $id;
	/** @Column(name="username", type="string") */
	protected $username;
	/** @Column(name="password", type="string") */
	protected $password;
    /**
     * @OneToMany(targetEntity="Session", mappedBy="user")
     **/
	protected $sessions;
	/**
     * @ManyToMany(targetEntity="Group", inversedBy="users")
     * @JoinTable(name="users_groups")
     **/
	protected $groups;
	/** @Column(name="active", type="boolean") */
	protected $active;
	/** @Column(name="created_at", type="datetime") */
	protected $created_at;
	/** @Column(name="updated_at", type="datetime") */
	protected $updated_at;

	public function __construct() {
        $this->sessions = new ArrayCollection();
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

	public function getUsername(){
		return $this->username;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = md5($password);
	}

	public function getSessions(){
		return $this->sessions;
	}

	public function isActive(){
		return $this->active;
	}

	public function setActive($active){
		$this->active = $active;
	}

	public function getGroups(){
		return $this->groups;
	}

	public function addGroup($group){
		$this->groups->add($group);
	}

	public function removeGroup($group){
		$this->groups->remove($group);
	}

	public function auth($username, $password){
		return ($username === $this->username && $this->password === md5($password));
	}

	public function initAttributes($data){
		if(isset($data['username'])) $this->username = $data['username'];
		if(isset($data['password'])) $this->password = md5($data['password']);
		if(isset($data['active'])) $this->active = $data['active'];
		if(isset($data['group'])) $this->groups->add($data['group']);
	}

	public function isValid(){
		$isValid = false;

		if($this->username != null && 
			filter_var($this->username, FILTER_SANITIZE_STRING)) $isValid = true;
		
		if($isValid && $this->password != null && 
			filter_var($this->password, FILTER_SANITIZE_STRING)) $isValid = true;
		else $isValid = false;
		
		if($isValid && $this->active != null && 
			filter_var($this->active, FILTER_VALIDATE_BOOLEAN)) $isValid = true;
		else $isValid = false;

		return $isValid;
	}
}