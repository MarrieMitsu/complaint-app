<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller {

	public function index(){
		$data['title'] = 'Complaint Home';

		$this->load->view('templates/header', $data);
		$this->load->view('complaint/index');
		$this->load->view('templates/footer');
	}

	public function formulir(){
		$data['title'] = 'Complaint Formulir';

		$this->load->view('templates/header', $data);
		$this->load->view('complaint/formulir');
		$this->load->view('templates/footer');
	}

}