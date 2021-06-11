<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Model_dokter extends CI_Model
{
	
	public function get_dokter(){
		$this->db->select('*');
		$this->db->from('dokter d');
		$this->db->join('rumahsakit r', 'r.id_rs = d.id_rs');
		return $this->db->get()->result_array();
	}

	public function get_dokterbyid($id){
        return $this->db->get_where('dokter',array('id_rs'=>$id))->result_array();
	}
	
	public function get_rsbyid($id){
        return $this->db->get_where('rs',array('id_rs'=>$id))->result_array();
    }

	public function get_rs(){
		$this->db->select('*');
		$this->db->from('rumahsakit');
		return $this->db->get()->result_array();
	}
	public function tambah_dokter($data){
		$this->db->insert('dokter',$data);
	}
	public function update_dokter($id,$data){
		$this->db->where('id_dokter', $id);
		$this->db->update('dokter',$data);
	}
	public function delete_dokter($id){
		$this->db->where('id_dokter',$id);
		return $this->db->delete('dokter');
	}
	public function cariDataDokter()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('id_dokter', $keyword);
		$this->db->or_like('id_rs', $keyword);
		$this->db->or_like('nama_dokter', $keyword);
		$this->db->or_like('spesialis_dokter', $keyword);
		
		return $this->db->get('dokter')->result_array();

	}
	
}