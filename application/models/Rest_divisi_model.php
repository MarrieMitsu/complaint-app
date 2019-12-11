<?php

class Rest_divisi_model extends CI_Model{

	// Get Divisi
	public function getDivisi(){
		return $this->db->get('divisi')->result_array();
	}

	// Insert Divisi
	public function insertDivisi($divisi){
		$this->db->insert('divisi', ['nama_divisi' => $divisi]);
		return $this->db->affected_rows();
	}

	// Delete Divisi
	public function deleteDivisi($idDivisi){
		$this->db->delete('divisi', ['id_divisi' => $idDivisi]);
		return $this->db->affected_rows();
	}

}