<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Magang extends CI_Model {

	function getDataMagang() {
		$query = $this->db->get('tb_mahasiswa');
		return $query->result();
	}

	function insertDataMagang($data) {
		$this->db->insert('tb_mahasiswa', $data);
	}

	function getDataMagangDetail($nim) {
		$this->db->where('nim', $nim);
		$query = $this->db->get('tb_mahasiswa');
		return $query->row();
	}

	function updateDataMagang($nim, $data) {
		$this->db->where('nim', $nim);
		$this->db->update('tb_mahasiswa', $data);
	}

	function deleteDataMagang($nim) {
		$this->db->where('nim', $nim);
		$this->db->delete('tb_mahasiswa');
	}

}

/* End of file M_Mahasiswa.php */
/* Location: ./application/models/M_Mahasiswa.php */