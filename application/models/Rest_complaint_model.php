<?php

class Rest_complaint_model extends CI_Model{

	// Get Complaint
	public function getComplaint($status = null, $noKeluhan = null, $divisi = null, $tanggal = null, $search = null){

		if ($status === null && $noKeluhan === null && $divisi === null && $tanggal === null && $search === null) {
			return $this->db->get('keluhan')->result_array();
		}else if($status === null && $noKeluhan !== null){
			return $this->db->get_where('keluhan', ['no_keluhan' => $noKeluhan])->result_array();
		}else{
			// Check
			if ($noKeluhan === null && $divisi === null && $tanggal === null && $search === null) {
				// Status
				if ($status == 'pending' || $status == 'proses') {
					$where = "status='pending' OR status='proses'";
					return $this->db->get_where('keluhan', $where)->result_array();
				}else{
					return $this->db->get_where('keluhan', ['status' => $status])->result_array();
				}
			}else if($noKeluhan === null && $divisi !== null && $tanggal === null && $search === null){
				// Status, divisi
				if ($status == 'pending' || $status == 'proses') {
					$where = "(status='pending' OR status='proses') AND divisi='$divisi'";
					return $this->db->get_where('keluhan', $where)->result_array();
				}else{
					return $this->db->get_where('keluhan', ['status' => $status, 'divisi' => $divisi])->result_array();
				}
			}else if($noKeluhan !== null && $divisi === null && $tanggal === null && $search === null){
				// Status, No_keluhan
				return $this->db->get_where('keluhan', ['no_keluhan' => $noKeluhan])->result_array();
			}else if($noKeluhan === null && $divisi !== null || $tanggal !== null || $search !== null){
				// Status, Divisi or Tanggal or Search
				if ($status == 'pending' || $status == 'proses') {
					$where = "( (status='pending' OR status='proses') AND (divisi LIKE '%$divisi%' AND tgl_keluhan LIKE '%$tanggal%' AND (no_keluhan LIKE '%$search%' OR nisn LIKE '%$search%' OR pelapor LIKE '%$search%') ) )";
					return $this->db->get_where('keluhan', $where)->result_array();
				}else{
					$where = "( status='$status' AND (divisi LIKE '%$divisi%' AND tgl_keluhan LIKE '%$tanggal%' AND (no_keluhan LIKE '%$search%' OR nisn LIKE '%$search%' OR pelapor LIKE '%$search%') ) )";
					return $this->db->get_where('keluhan', $where)->result_array();
				}
			}
		}

	}

	// Insert Complaint
	public function insertComplaint($data){
		$this->db->insert('keluhan', $data);
		return $this->db->affected_rows();
	}

	// Update Complaint
	public function updateComplaint($noKeluhan, $status = null, $waktu = null, $feedback1 = null, $feedback2 = null){

		if ($status !== null && $waktu === null && $feedback1 === null && $feedback2 === null) {
			// No_keluhan, Status
			$this->db->update('keluhan', ['status' => $status], ['no_keluhan' => $noKeluhan]);
			return $this->db->affected_rows();
		}else if($status !== null && $waktu !== null && $feedback1 === null && $feedback2 === null){
			// No_keluhan, Status, Waktu
			$this->db->update('keluhan', ['status' => $status, 'hari' => $waktu], ['no_keluhan' => $noKeluhan]);
			return $this->db->affected_rows();
		}else if($status === null && $waktu === null && $feedback1 !== null && $feedback2 === null){
			// Feedback 1
			$this->db->update('keluhan', ['feedback_1' => $feedback1], ['no_keluhan' => $noKeluhan]);
			return $this->db->affected_rows();
		}else if($status !== null && $waktu === null && $feedback1 === null && $feedback2 !== null){
			// Feedback 2
			$this->db->update('keluhan', ['status' => $status, 'feedback_2' => $feedback2], ['no_keluhan' => $noKeluhan]);
			return $this->db->affected_rows();
		}

	}

	// Delete Complaint
	public function deleteComplaint($noKeluhan = null, $deleteAll = null){
		if ($noKeluhan !== null && $deleteAll === null) {
				$this->db->delete('keluhan', ['no_keluhan' => $noKeluhan]);
				return $this->db->affected_rows();
			}else if($noKeluhan === null && $deleteAll !== null){
				$this->db->delete('keluhan', ['status' => $deleteAll]);
				return $this->db->affected_rows();
			}
	}

}