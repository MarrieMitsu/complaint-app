<?php

class Rest_teknisi_model extends CI_Model{

	// Get Teknisi
	public function getTeknisi($idTeknisi = null, $username = null, $divisi = null , $search = null){

		if ($idTeknisi === null && $username == null && $divisi === null && $search === null) {
			// All
			return $this->db->get_where('teknisi', ['status' => 1])->result_array();
		}else if($idTeknisi !== null && $username === null && $divisi === null && $search === null){
			// Id Teknisi
			return $this->db->get_where('teknisi', ['id_teknisi' => $idTeknisi, 'status' => 1])->result_array();
		}else if($idTeknisi === null && $username !== null && $divisi === null && $search === null){
			// Username
			return $this->db->get_where('teknisi', ['username' => $username, 'status' => 1])->result_array();
		}else if($idTeknisi === null && $username === null && $divisi !== null || $search !== null){
			// Divisi or Search
			$where = "(divisi LIKE '%$divisi%' AND (id_teknisi LIKE '%$search%' OR nama_user LIKE '%$search%' OR username LIKE '%$search%') AND status=1)";
			return $this->db->get_where('teknisi', $where)->result_array();
		}

	}

	// Insert Teknisi
	public function insertTeknisi($data){
		$this->db->insert('teknisi', $data);
		return $this->db->affected_rows();
	}

	// Update Teknisi
	public function updateTeknisi($idTeknisi, $status = null, $data = null){

		if ($data === null && $status !== null) {
			$this->db->update('teknisi', ['status' => $status], ['id_teknisi' => $idTeknisi]);
			return $this->db->affected_rows();
		}else{
			$this->db->update('teknisi', $data, ['id_teknisi' => $idTeknisi]);
			return $this->db->affected_rows();
		}
	}

	// Delete Complaint
	public function deleteTeknisi($idTeknisi){
		$this->db->delete('teknisi', ['id_teknisi' => $idTeknisi]);
		return $this->db->affected_rows();
	}

}