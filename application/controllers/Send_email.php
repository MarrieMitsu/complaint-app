<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

	public function index(){
		// Get Input
		$email = $this->input->post('email');
		$pelapor = $this->input->post('pelapor');
		$tanggal = $this->input->post('tgl_keluhan');
		$keluhan = $this->input->post('isi_keluhan');
		$hari = $this->input->post('hari');
		$feedback = $this->input->post('feedback_1');

		if ($feedback == 0) {
			$feedback = 'sedang diproses, dengan perkiraan waktu '. $hari .' hari';
		}else if($feedback == 1){
			$feedback = 'sudah selesai ditangani';
		}

		$result = sendEmail($email, $pelapor, $tanggal, $keluhan, $feedback);
		echo json_encode($result);
	}

}