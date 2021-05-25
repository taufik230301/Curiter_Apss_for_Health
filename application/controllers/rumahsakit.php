<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RumahSakit extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_rs');
        $this->load->model('m_user');
        $this->load->model('m_dokter');
        $this->load->model('m_poli');
    }
    public function index(){
        $this->m_user->checklogin();
        $data['title'] = "Curiter | Rumah Sakit";
        if($this->input->post('search')){
            $data['rs'] = $this->m_rs->searchrs($this->input->post('search'));
        }else{
            $data['rs'] = $this->db->get('rumahsakit')->result_array();
        }
        
        $this->load->view('header_page',$data);
        $this->load->view('v_rumahsakit',$data);
        $this->load->view('footer_page');
    }
    public function DetailRS($id){
        $this->m_user->checklogin();
        $data['title'] = "Curiter | Detail Rumah Sakit";
        $data['rsid'] = $this->m_rs->get_datars($id);
        $data['drrs'] = $this->m_dokter->get_dokterbyid($id);
        $data['poli'] = $this->m_poli->get_polibyid($id);
        $this->load->view('header_page',$data);
        $this->load->view('v_detailrs',$data);
        $this->load->view('footer_page');
    }
}
