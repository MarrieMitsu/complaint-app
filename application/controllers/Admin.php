<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public $data = [];

	public function __construct(){
		parent::__construct();
		$this->data['id'] = $this->session->userdata('id');
		$this->data['namaUser'] = $this->session->userdata('nama_user');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['role'] = $this->session->userdata('role');
	}

	public function index(){
		isLogin('unset');
		$this->data['title'] = 'Admin | Dashboard';

		$this->load->view('templates/header', $this->data);
		$this->load->view('templates/admin-navbar');
		$this->load->view('admin/index');
		$this->load->view('templates/private-footer');
	}

	public function teknisiPage(){
		isLogin('unset');
		$this->data['title'] = 'Admin | Teknisi';

		$this->load->view('templates/header', $this->data);
		$this->load->view('templates/admin-navbar');
		$this->load->view('admin/teknisi');
		$this->load->view('templates/private-footer');
	}

	public function divisiPage(){
		isLogin('unset');
		$this->data['title'] = 'Admin | Divisi';

		$this->load->view('templates/header', $this->data);
		$this->load->view('templates/admin-navbar');
		$this->load->view('admin/divisi');
		$this->load->view('templates/private-footer');
	}

	public function profilePage(){
		isLogin('unset');
		$this->data['title'] = 'Admin | Profile';

		$this->load->view('templates/header', $this->data);
		$this->load->view('templates/admin-navbar');
		$this->load->view('admin/profile', $this->data);
		$this->load->view('templates/private-footer');
	}

}