<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Rest_divisi extends REST_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rest_divisi_model');
	}

	// Get Divisi
	public function index_get(){
		// Get
		$divisi = $this->Rest_divisi_model->getDivisi();

		// Response
		if ($divisi) {
			$this->response([
				'status' => 1,
				'data' => $divisi
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => 0,
				'message' => 'Status tidak diketahui'
			], REST_Controller::HTTP_OK);
		}
	}

	// Post Divisi
	public function index_post(){
		// Get params
		$divisi = $this->post('divisi');

		// Response
		if ($this->Rest_divisi_model->insertDivisi($divisi) > 0) {
			$this->response([
				'status' => 1,
				'message' => 'Divisi berhasil ditambahkan'
			], REST_Controller::HTTP_CREATED);
		}else{
			$this->response([
				'status' => 0,
				'message' => 'Divisi gagal ditambahkan'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	// Delete Divisi
	public function index_delete(){
		// Get params
		$idDivisi = $this->delete('id_divisi');

		if ($idDivisi === null) {
			$this->response([
				'status' => 0,
				'message' => 'ID tidak diketahui'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->Rest_divisi_model->deleteDivisi($idDivisi) > 0) {
				$this->response([
					'status' => 1,
					'message' => 'Divisi berhail dihapus'
				], REST_Controller::HTTP_OK);
			}else{
				$this->response([
					'status' => 0,
					'message' => 'Id tidak ditemukan'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

}