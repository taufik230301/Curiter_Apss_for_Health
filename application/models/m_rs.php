<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_Rs extends CI_Model
{
    public function get_datars($id){
        return $this->db->get_where('rumahsakit',['id_rs'=>$id])->row_array();
    }
    public function searchrs($keyword){
        $this->db->like('nama_rs', $keyword);
        $this->db->or_like('alamat_rs', $keyword);
        $this->db->or_like('kota',$keyword);
        $this->db->or_like('telp_rs',$keyword);
        return $this->db->get('rumahsakit')->result_array();
    }
}