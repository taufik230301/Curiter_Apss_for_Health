<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Rs extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/model_rs');
		       $this->load->model('m_rs');
        $this->load->model('m_user');
        $this->load->model('m_dokter');
        $this->load->model('m_poli');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Curiter | Data Rumah Sakit';
		$data['rs'] = $this->model_rs->get_rs();
		$data['poli'] = $this->model_rs->get_poli();
		$this->load->view('header_page_admin',$data);
		$this->load->view('admin/v_datars',$data);
		$this->load->view('footer_page');
	}
	public function tambah(){
		$data = [
			'nama_rs' => $this->input->post('nama', true),
			'alamat_rs' =>$this->input->post('alamat', true),
			'website' =>$this->input->post('website', true),
			'kota' => $this->input->post('kota',true),
			'telp_rs' => $this->input->post('no',true),
			'fasilitas_rs' => $this->input->post('fasilitas', true),
			'tentang_rs' => $this->input->post('tentang', true)
		];
		$this->model_rs->tambah_rs($data);
		redirect('admin/rs/index');
	/*	$data['title'] = 'Curiter | Tambah RS';
		$data['poli'] = $this->model_rs->get_poli();
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('telp','Telp','required|numeric');
		$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required');
		//$this->form_validation->set_rules('poli','Poli','required');
		$this->form_validation->set_rules('tentang', 'Tentang', 'required');
		if($this->form_validation->run() == false){
			$this->load->view('header_page_admin', $data);
			$this->load->view('admin/rs/tambah', $data);
			$this->load->view('footer_page');
		}
		else{
			$this->model_rs->tambah_rs();
			redirect('admin/rs/index');
		}*/
	}
	public function edit($id){
		$data = [
			'nama_rs' => $this->input->post('nama', true),
			'alamat_rs' =>$this->input->post('alamat', true),
			'website' =>$this->input->post('website', true),
			'kota' => $this->input->post('kota',true),
			'telp_rs' => $this->input->post('no',true),
			'fasilitas_rs' => $this->input->post('fasilitas', true),
			'tentang_rs' => $this->input->post('tentang', true)
		];
		$this->model_rs->update_rs($id, $data);
		redirect('admin/rs/index');
		/*$data['r'] = $this->model_rs->get_ById($id);
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('telp','Telp','required|numeric');
		$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required');
		//$this->form_validation->set_rules('poli','Poli','required');
		if($this->form_validation->run() == false){
			$this->load->view('header_page_admin');
			$this->load->view('admin/v_datars', $data);
			$this->load->view('footer_page');
		}
		else{
			$this->model_rs->update_rs($id);
			redirect('admin/rs/index');
		}*/
	}
	public function hapus($id){
		$this->model_rs->delete_rs($id);
		redirect('admin/rs/index');
	}

	public function detail_rs($id){
		$data['title'] = "Curiter | Detail Rumah Sakit";
        $data['rsid'] = $this->m_rs->get_datars($id);
        $data['drrs'] = $this->m_dokter->get_dokterbyid($id);
		$data['poli'] = $this->m_poli->get_polibyid($id);
		$data['polik'] = $this->model_rs->get_poli();
        $this->load->view('header_page_admin',$data);
        $this->load->view('admin/v_detail_rs',$data);
        $this->load->view('footer_page');
	}

	public function tambah_poliklinik(){
			$data = [
			'id_rs' => $this->input->post('id', true),
			'nama_poli' => $this->input->post('nama_poli', true),
			'tentang_poli' =>$this->input->post('deskripsi', true),
		];
		$this->model_rs->tambah_poliklinik($data);
		redirect('admin/rs/detail_rs/'.$data['id_rs']);
	}
}