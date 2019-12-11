<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Rest_complaint extends REST_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rest_complaint_model');
	}

	// Get Complaint
	public function index_get(){
		// Get params
		$status = $this->get('status');
		$noKeluhan = $this->get('no_keluhan');
		$divisi = $this->get('divisi');
		$tanggal = $this->get('tanggal');
		$search = $this->get('search');

		// Check
		if ($status === null && $noKeluhan === null && $divisi === null && $tanggal === null && $search === null) {
			$complaint = $this->Rest_complaint_model->getComplaint();
		}else if($status === null && $noKeluhan !== null){
			$complaint = $this->Rest_complaint_model->getComplaint(null, $noKeluhan);
		}else{
			// Check
			if ($noKeluhan === null && $divisi === null && $tanggal === null && $search === null) {
				// Status
				$complaint = $this->Rest_complaint_model->getComplaint($status);
			}else if($noKeluhan === null && $divisi !== null && $tanggal === null && $search === null){
				// Status, divisi
				$complaint = $this->Rest_complaint_model->getComplaint($status, null, $divisi);
			}else if($noKeluhan !== null && $divisi === null && $tanggal === null && $search === null){
				// Status, No_keluhan
				$complaint = $this->Rest_complaint_model->getComplaint($status, $noKeluhan);
			}else if($noKeluhan === null && $divisi !== null || $tanggal !== null || $search !== null){
				// Status, Divisi or Tanggal or Search
				$complaint = $this->Rest_complaint_model->getComplaint($status, null, $divisi, $tanggal, $search);
			}

			// Response
			if ($complaint) {
				$this->response([
					'status' => 1,
					'data' => $complaint
				], REST_Controller::HTTP_OK);
			}else{
				$this->response([
					'status' => 0,
					'message' => 'Data tidak ditemukan'
				], REST_Controller::HTTP_OK);
			}
		}

		// Response
		if ($complaint) {
			$this->response([
				'status' => 1,
				'data' => $complaint
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => 0,
				'message' => 'Data tidak ditemukan'
			], REST_Controller::HTTP_OK);
		}

	}

	// Post Complaint
	public function index_post(){
		// Random generator
		$noKeluhan = date("dhs") . rand(11, 99);

		// Get params and store it inside an array
		$data = [
			'no_keluhan' => $noKeluhan,
			'nisn' => $this->post('nisn'),
			'pelapor' => $this->post('pelapor'),
			'email' => $this->post('email'),
			'divisi' => $this->post('divisi'),
			'isi_keluhan' => $this->post('keluhan'),
			'hari' => 0,
			'status' => 'Baru',
			'feedback_1' => 0,
			'feedback_2' => 0
		];

		// Response
		if ($this->Rest_complaint_model->insertComplaint($data) > 0) {
			$this->response([
				'status' => 1,
				'message' => 'Keluhan telah dibuat'
			], REST_Controller::HTTP_CREATED);
		}else{
			$this->response([
				'status' => 0,
				'message' => 'Gagal menginput keluhan'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	// Put Complaint
	public function index_put(){
		// Get params
		$noKeluhan = $this->put('no_keluhan');
		$status = $this->put('status');
		$waktu = $this->put('waktu');
		$feedback1 = $this->put('feedback_1');
		$feedback2 = $this->put('feedback_2');

		// Check
		if ($noKeluhan === null && $status === null && $waktu === null && $feedback1 === null && $feedback2 === null) {
			$this->response([
				'status' => 0,
				'message' => 'Parameter tidak diketahui'
			], REST_Controller::HTTP_NOT_FOUND);
		}else{
			if ($status !== null && $waktu === null && $feedback1 === null && $feedback2 === null) {
				// No_keluhan, Status
				$complaint = $this->Rest_complaint_model->updateComplaint($noKeluhan, $status);
			}else if($status !== null && $waktu !== null && $feedback1 === null && $feedback2 === null){
				// No_keluhan, Status, Waktu
				$complaint = $this->Rest_complaint_model->updateComplaint($noKeluhan, $status, $waktu);
			}else if($status === null && $waktu === null && $feedback1 !== null && $feedback2 === null){
				// Feedback 1
				$complaint = $this->Rest_complaint_model->updateComplaint($noKeluhan, null, null, $feedback1);
			}else if($status !== null && $waktu === null && $feedback1 === null && $feedback2 !== null){
				// Feedback 2
				$complaint = $this->Rest_complaint_model->updateComplaint($noKeluhan, $status, null, null , $feedback2);
			}

			// Response
			if ($complaint > 0) {
				$this->response([
					'status' => 1,
					'message' => 'Keluhan berhasil diupdate'
				], REST_Controller::HTTP_OK);
			}else{
				$this->response([
					'status' => 0,
					'message' => 'Gagal mengupdate data',
				], REST_Controller::HTTP_OK);
			}
		}

	}

	// Delete Complaint
	public function index_delete(){
		// Get Params
		$noKeluhan = $this->delete('no_keluhan');
		$deleteAll = $this->delete('delete_all');

		// Check
		if ($noKeluhan === null && $deleteAll === null) {
			$this->response([
				'status' => 0,
				'message' => 'Parameter tidak diketahui'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($noKeluhan !== null && $deleteAll === null) {
				$complaint = $this->Rest_complaint_model->deleteComplaint($noKeluhan);
			}else if($noKeluhan === null && $deleteAll !== null){
				$complaint = $this->Rest_complaint_model->deleteComplaint(null, $deleteAll);
			}

			// Response
			if ($complaint > 0) {
				$this->response([
					'status' => 1,
					'message' => 'Keluhan berhasil dihapus'
				], REST_Controller::HTTP_OK);
			}else{
				$this->response([
					'status' => 0,
					'message' => 'Keluhan gagal dihapus'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}

	}

}