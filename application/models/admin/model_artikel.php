<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Model_artikel extends CI_Model
{
	public function get_artikel(){
		return $this->db->get('artikel')->result_array();
	}

	public function tambah_artikel($data){
		$this->db->insert('artikel', $data);
	}

	public function update_artikel($data,$kondisi){
		   $this->db->update('artikel',$data,$kondisi);
      return TRUE;
	}

	public function hapus_artikel($id){
		$this->db->where('id_artikel',$id);
		return $this->db->delete('artikel');
	}
}