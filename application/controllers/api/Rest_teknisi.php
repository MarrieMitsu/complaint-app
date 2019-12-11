<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Rest_teknisi extends REST_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rest_teknisi_model');
	}

	// Get Teknisi
	public function index_get(){
		// Get params
		$idTeknisi = $this->get('id_teknisi');
		$username = $this->get('username');
		$divisi = $this->get('divisi');
		$search = $this->get('search');

		// Check
		if ($idTeknisi === null && $username == null && $divisi === null && $search === null) {
			// All
			$teknisi = $this->Rest_teknisi_model->getTeknisi();
		}else if($idTeknisi !== null && $username === null && $divisi === null && $search === null){
			// Id Teknisi
			$teknisi = $this->Rest_teknisi_model->getTeknisi($idTeknisi, null, null, null);
		}else if($idTeknisi === null && $username !== null && $divisi === null && $search === null){
			// Username
			$teknisi = $this->Rest_teknisi_model->getTeknisi(null, $username, null, null);
		}else if($idTeknisi === null && $username === null && $divisi !== null || $search !== null){
			// Divisi or Search
			$teknisi = $this->Rest_teknisi_model->getTeknisi(null, null, $divisi, $search);
		}

		// Response
		if ($teknisi) {
			$this->response([
				'status' => 1,
				'data' => $teknisi
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => 0,
				'message' => 'Data tidak ditemukan'
			], REST_Controller::HTTP_OK);
		}
	}

	// Post Teknisi
	public function index_post(){
		// Get params and store it inside array
		$data = [
			'nama_user' => $this->post('nama_teknisi'),
			'username' => $this->post('username'),
			'password' => $this->post('password'),
			'divisi' => $this->post('divisi'),
			'status' => 1
		];

		// Response
		if ($this->Rest_teknisi_model->insertTeknisi($data) > 0) {
			$this->response([
				'status' => 1,
				'message' => 'Teknisi berhasil ditambahkan'
			], REST_Controller::HTTP_CREATED);
		}else{
			$this->response([
				'status' => 0,
				'message' => 'Teknisi gagal ditambahkan'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	// Put Teknisi
	public function index_put(){
		// Get params and store it inside array
		$idTeknisi = $this->put('id_teknisi');
		$namaTeknisi = $this->put('nama_teknisi');
		$password = $this->put('password');
		$divisi = $this->put('divisi');
		$status = $this->put('status');

		// Check
		if ($namaTeknisi === null && $password === null && $divisi === null && $status !== null) {
			$teknisi = $this->Rest_teknisi_model->updateTeknisi($idTeknisi, $status);
		}else{
			$data = [
				'nama_user' => $namaTeknisi,
				'password' => $password,
				'divisi' => $divisi
			];
			$teknisi = $this->Rest_teknisi_model->updateTeknisi($idTeknisi, null, $data);
		}

		// Response
		if ($teknisi) {
			$this->response([
				'status' => 1,
				'message' => 'Teknisi berhasil diupdate'
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => 0,
				'message' => 'Teknisi gagal diupdate'
			], REST_Controller::HTTP_OK);
		}
	}

	// Delete Complaint
	public function index_delete(){
		$idTeknisi = $this->delete('id_teknisi');

		if ($idTeknisi === null) {
			$this->response([
				'status' => 0,
				'message' => 'Parameter tidak diketahui'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->Rest_teknisi_model->deleteTeknisi($idTeknisi) > 0) {
				$this->response([
					'status' => 1,
					'message' => 'Teknisi berhasil dihapus'
				], REST_Controller::HTTP_OK);
			}else{
				$this->response([
					'status' => 0,
					'message' => 'Teknisi gagal dihapus'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

}