<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_admin extends HH_Model {

	public function login($username, $password) {
		$result = $this->db
            ->select('*')
            ->where('password', md5($password))
	        ->where('username', $username)
            ->where('deleted', 0)
            ->get('hh_users');
        return $result;
	}
	
}