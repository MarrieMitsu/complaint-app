<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index(){
		isLogin('set');
		$data['title'] = 'Login';

		$this->load->view('templates/header', $data);
		$this->load->view('login/index');
		$this->load->view('templates/footer');
	}

	// Login
	public function loginAuth(){
		// Get post
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		// Login Validation
		$data = $this->Auth_model->loginValidation($username, $password);
		$admin = $data['admin'];
		$teknisi = $data['teknisi'];
		
		if ($admin != null) {
			if ($admin['password'] !== $password) {
				$status = ['status' => 0, 'id' => 'password', 'res' => 'Password tidak sesuai'];
			}else{
				$data = [
					'id' => $admin['id_admin'],
					'username' => $admin['username'],
					'nama_user' => $admin['nama_user'],
					'role' => 'Admin',
					'logged_in' => TRUE
				];
				$this->session->set_userdata($data);
				$status = ['status' => 1, 'role' => 'Admin'];
			}
		}elseif ($teknisi != null) {
			if ($teknisi['password'] !== $password && $teknisi['status'] !== 1) {
				$status = ['status' => 0, 'id' => 'password', 'res' => 'Password tidak sesuai'];
			}else{
				$data = [
					'id' => $teknisi['id_teknisi'],
					'username' => $teknisi['username'],
					'nama_user' => $teknisi['nama_user'],
					'divisi' => $teknisi['divisi'],
					'role' => 'Teknisi',
					'logged_in' => TRUE
				];
				$this->session->set_userdata($data);
				$status = ['status' => 1, 'role' => 'Teknisi'];
			}
		}else{
			$status = ['status' => 0, 'id' => 'username', 'res' => 'Username tidak ada'];
		}

		echo json_encode($status);
	}

	// Logout
	public function logout(){
		$this->session->sess_destroy();
		echo json_encode(['status' => 1]);
	}

}