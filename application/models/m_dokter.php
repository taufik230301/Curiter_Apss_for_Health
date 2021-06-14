<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_dokter extends CI_Model
{
    public function get_dokter(){
        $this->db->select('*');
        $this->db->from('dokter');
        $this->db->join('rumahsakit','rumahsakit.id_rs = dokter.id_rs');
        return $this->db->get()->result_array();
    }
    public function get_dokterbyid($id){
        return $this->db->get_where('dokter',array('id_rs'=>$id))->result_array();
    }
    public function get_dokterbyidpoli($id)
    {
        $this->db->select('*');
        
        $this->db->join('poliklinik', 'poliklinik.id_poli = dokter.id_poli');
       
        return $this->db->get_where('dokter', array('dokter.id_poli' => $id))->result_array();
    }
    public function searchdokter($keyword){
        $this->db->select('*');
        $this->db->from('dokter');
        $this->db->join('rumahsakit','rumahsakit.id_rs = dokter.id_rs');
        $this->db->like('nama_dokter', $keyword);
        $this->db->or_like('spesialis_dokter', $keyword);
        $this->db->or_like('rumahsakit.nama_rs',$keyword);
        return $this->db->get()->result_array();
    }
}