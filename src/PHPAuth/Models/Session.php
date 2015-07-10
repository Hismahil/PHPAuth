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
	/** @Column(name="session_id", type="string") */
	protected $session_id;
	/** @Column(name="expire", type="time") */
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

	public function getExpire(){
		return $this->expire;
	}

	public function setExpire($expire){
		$this->expire = $expire;
	}

	public function getSessionId(){
		return $this->session_id;
	}

	public function setSessionId($session_id){
		$this->session_id = $session_id;
	}
	
	public static function create($user){
		if(session_status() !== PHP_SESSION_ACTIVE) session_start();
		session_regenerate_id(true);
		$session_data = array('user_id' => $user->getId(), 'time' => time(), 'id'=> session_id());
		$_SESSION['user'] = $session_data;
		return $session_data;
	}

	public static function isValid(){
		if(session_status() !== PHP_SESSION_ACTIVE) session_start();
		return ($_SESSION['user']['time'] - time() < 1800 ? true : false);
	}
}