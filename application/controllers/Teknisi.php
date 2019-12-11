<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi extends CI_Controller {
	public $data = [];

	public function __construct(){
		parent::__construct();

		$this->data['id'] = $this->session->userdata('id');
		$this->data['namaUser'] = $this->session->userdata('nama_user');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['divisi'] = $this->session->userdata('divisi');
		$this->data['role'] = $this->session->userdata('role');
	}

	public function index(){
		isLogin('unset');
		$this->data['title'] = 'Teknisi | Dashboard';

		$this->load->view('templates/header', $this->data);
		$this->load->view('templates/teknisi-navbar');
		$this->load->view('teknisi/index', $this->data);
		$this->load->view('templates/private-footer');
	}

	public function profilePage(){
		isLogin('unset');
		$this->data['title'] = 'Teknisi | Profile';

		$this->load->view('templates/header', $this->data);
		$this->load->view('templates/teknisi-navbar');
		$this->load->view('teknisi/profile');
		$this->load->view('templates/private-footer');
	}

}