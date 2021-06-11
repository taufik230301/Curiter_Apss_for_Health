<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dokter extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/model_dokter');
		$this->load->model('m_poli');
		$this->load->model('m_rs');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Curiter | Admin';
		$data['d'] = $this->model_dokter->get_dokter();
		$data['rs'] = $this->model_dokter->get_rs();
		$this->load->view('header_page_admin',$data);
		$this->load->view('admin/v_rumahsakit',$data);
		$this->load->view('footer_page');
	}

	public function detaildokter($id){
		$data['title'] = 'Curiter | Admin';
		$data['d'] = $this->model_dokter->get_dokterbyid($id);
		$data['rs'] = $this->m_rs->get_datars($id);
		$data['poli'] = $this->m_poli->get_polibyid($id);
		$this->load->view('header_page_admin',$data);
		$this->load->view('admin/v_datadokter',$data);
		$this->load->view('footer_page');
	}

	public function tambah(){
		$data = [
			'id_rs' => $this->input->post('id_rs', true),
			'no_dokter' => $this->input->post('no', true),
			'nama_dokter' =>$this->input->post('nama', true),
			'id_poli' => $this->input->post('id_poli',true),
			'email_dokter' => $this->input->post('email', true)
		];
		$this->model_dokter->tambah_dokter($data);
		redirect('admin/dokter/detaildokter/'.$data['id_rs']);
	}
	public function edit($id){
		$data = [
			'id_rs' => $this->input->post('rs', true),
			'no_dokter' => $this->input->post('no', true),
			'nama_dokter' =>$this->input->post('nama', true),
			'spesialis_dokter' => $this->input->post('spesialis',true),
			'bio_dokter' => $this->input->post('bio',true),
			'email_dokter' => $this->input->post('email', true),
			'harga_dokter' => $this->input->post('harga', true)
		];
		$this->model_dokter->update_dokter($id, $data);
		redirect('admin/dokter/index');
	}
	public function hapus($id){
		$this->model_dokter->delete_dokter($id);
		redirect('admin/dokter/index');
	}
}