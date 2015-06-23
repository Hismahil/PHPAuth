<?php

namespace PHPAuth\Helper;

class UserSessionHelper {
	/**
	* @param $user_id 			Id of user
	* @param $current_time 		String of current DateTime
	* @param $expire_at 		String of expire DateTime ($current_time + 30 min)
	* @return array("current" => $hash_current_time, "expire" => $hash_expire_at)
	*/
	public function createSession($user_id, $current_time, $expire_at){
		if(session_status() !== PHP_SESSION_ACTIVE) session_start();
		$hash_current_time = md5($user_id."".$current_time);
		$_SESSION["current_user"] = $hash_current_time;
		session_write_close();
		return array("current" => $hash_current_time, "expire" => md5($user_id."".$expire_at));
	}

	/**
	* @param $session_db		array('user_id' => id, 'current' => 'hash_of_current_time_on_db', 'expire' => 'hash_of_expire_at_on_db')
	* @param $current_time 		String of current DateTime
	* @return True 				if session between has_current_time and $hash_expire_at
	*/
	public function isValidSession($session_db, $current_time){
		if(session_status() !== PHP_SESSION_ACTIVE) session_start();

		if(validateSession($user_id, $current_time, $expire_at, $hash_expire_at)) return true;
		else {
			session_destroy();
			return false;
		}
	}

	private function validateSession($user_id, $current_time, $expire_at, $hash_expire_at){
		$hash_current_time = md5("".$user_id."".$current_time);
		if($hash_current_time === $_SESSION["current_user"] && $_SESSION["user_id"] === $user_id) return true;
		else return ($hash_expire_at === md5("".$user_id."".$expire_at) && $_SESSION["user_id"] === $user_id);
	}
}