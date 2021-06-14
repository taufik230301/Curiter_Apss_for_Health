<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class caridokterrs extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
        $this->load->model('m_poli');
        $this->load->model('m_dokter');

    }

    public function index(){
        $this->m_user->checklogin();
        $data['title'] = "Curiter | Cari Dokter";
        $data['rs'] = $this->db->get('rumahsakit')->result_array();
        $this->load->view('header_page',$data);
        $this->load->view('v_dokter_rs');
        $this->load->view('footer_page');
    }

    public function poli($id){
        $data['title'] = "Curiter | Cari Dokter";
        $data['poli'] = $this->m_poli->get_polibyid($id);
        $this->load->view('header_page', $data);
        $this->load->view('v_polidokter');
        $this->load->view('footer_page');
    }

    public function dokter($id){
        $data['title'] = "Curiter | Cari Dokter";
        $data['dokter'] = $this->m_dokter->get_dokterbyidpoli($id);
        $data['poli'] = $this->m_poli->get_poli();
        $this->load->view('header_page', $data);
        $this->load->view('v_dokter_bypoli',$data);
        $this->load->view('footer_page');
    }

}