<?php

namespace PHPAuth\Models;

/**
 * @Entity
 * @Table(name="sessions")
 */
class Session {

	/**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
	protected $id;
	/**
     * @ManyToOne(targetEntity="User", inversedBy="sessions")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     **/
	protected $user;
	/** @Column(name="current", type="string") */
	protected $current;
	/** @Column(name="expire", type="string") */
	protected $expire;
	/** @Column(name="created_at", type="datetime") */
	protected $created_at;
	/** @Column(name="updated_at", type="datetime") */
	protected $updated_at;

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

	public function getUser(){
		return $this->user;
	}

	public function setUser($user){
		$this->user = $user;
	}

	public function getCurrent(){
		return $this->current;
	}

	public function setCurrent($current){
		$this->current = $current;
	}

	public function getExpire(){
		return $this->expire;
	}

	public function setExpire($expire){
		$this->expire = $expire;
	}
}