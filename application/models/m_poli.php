<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_Poli extends CI_Model
{
    public function get_polibyid($id){
        return $this->db->get_where('poliklinik',array('id_rs'=>$id))->result_array();
    }

    public function get_poli(){
        $this->db->select('*');
        $this->db->from('poliklinik');
        $this->db->join('rumahsakit','rumahsakit.id_rs = poliklinik.id_rs');
        return $this->db->get()->result_array();
    }
}