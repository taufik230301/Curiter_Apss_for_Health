<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{
	public function login(){
		$data = [
		"nama_admin" => $this->input->post('nama'),
		"username" => $this->input->post('username'),
		"password_admin" => $this->input->post('password')
		];
		return $this->db->insert('admin', $data);	
	}
	public function verifikasi($username){
		return $this->db->get_where('admin',['username'=> $username])->row_array();
	}
}