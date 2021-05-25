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
}