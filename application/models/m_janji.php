<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_Janji extends CI_Model
{
    public function getjanji($id){
        $this->db->select('*');
        $this->db->from('janji');
        $this->db->join('dokter','dokter.id_dokter = janji.id_dokter');
        $this->db->where('id_user',$id);
        return $this->db->get()->result_array();
    }
}