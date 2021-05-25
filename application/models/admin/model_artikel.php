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
}