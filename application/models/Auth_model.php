<?php 

class Auth_model extends CI_Model{

	// Login Validation Get data
	public function loginValidation($username, $password){
		$admin = $this->db->get_where('admin', ['username' => $username])->row_array();
		$teknisi = $this->db->get_where('teknisi', ['username' => $username])->row_array();

		return ['admin' => $admin, 'teknisi' => $teknisi];
	}

}