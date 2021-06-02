<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Model_rs extends CI_Model
{
	
	public function get_rs(){
		$this->db->select('*');
		$this->db->from('rumahsakit');
		return $this->db->get()->result_array();
	}
	public function tambah_rs($data){
		/*$data = [
			'nama_rs' => $this->input->post('nama',true),
			'alamat_rs' => $this->input->post('alamat',true),
			'kota' => $this->input->post('kota',true),
			'telp_rs' =>$this->input->post('telp',true),
			'fasilitas_rs' =>$this->input->post('fasilitas',true),
			//'poliklinik_rs' => $this->input->post('poli',true),
			'tentang_rs' => $this->input->post('tentang',true)
		];*/
		$this->db->insert('rumahsakit', $data);
	}
	public function update_rs($id, $data){
		/*$data = [
			'nama_rs' => $this->input->post('nama',true),
			'alamat_rs' => $this->input->post('alamat',true),
			'kota' => $this->input->post('kota',true),
			'telp_rs' =>$this->input->post('telp',true),
			'fasilitas_rs' =>$this->input->post('fasilitas',true),
			//'poliklinik_rs' => $this->input->post('poli',true),
		];*/
		$this->db->where('id_rs', $id);
		$this->db->update('rumahsakit',$data);
	}
	public function delete_rs($id){
		$this->db->where('id_rs',$id);
		return $this->db->delete('rumahsakit');
	}
	public function get_ById($id){
		return $this->db->get_where('rumahsakit', array('id_rs' => $id))->row_array();
	}
	public function get_poli(){
		$this->db->select('*');
		$this->db->from('poliklinik');
		$this->db->join('rumahsakit', 'rumahsakit.id_rs = poliklinik.id_rs');
		return $this->db->get()->result();
	}
		public function tambah_poliklinik($data){
		/*$data = [
			'nama_rs' => $this->input->post('nama',true),
			'alamat_rs' => $this->input->post('alamat',true),
			'kota' => $this->input->post('kota',true),
			'telp_rs' =>$this->input->post('telp',true),
			'fasilitas_rs' =>$this->input->post('fasilitas',true),
			//'poliklinik_rs' => $this->input->post('poli',true),
			'tentang_rs' => $this->input->post('tentang',true)
		];*/
		$this->db->insert('poliklinik', $data);
	}
}