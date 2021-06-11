<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caridokter extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('m_user');
        $this->load->model('m_dokter');
        $this->load->model('m_rs');
    }
    public function index(){
        $this->m_user->checklogin();
        $data['title'] = "Curiter | Cari Dokter";
        if($this->input->post('search')){
            $data['d'] = $this->m_dokter->searchdokter($this->input->post('search'));
        }else{
            $data['d'] = $this->m_dokter->get_dokter();
        }
        $this->load->view('header_page',$data);
        $this->load->view('v_caridokter',$data);
        $this->load->view('footer_page');
    }
    public function janji($id){
        $this->form_validation->set_rules('fullname','Fullname','required|trim');
        $this->form_validation->set_rules('notelp','Notelp','required|trim');
        $this->form_validation->set_rules('tgljanji','Tgljanji','required|trim');
        $this->form_validation->set_rules('appt','Appt','required|trim');
        if ($this->form_validation->run() === false){
            redirect('caridokter');
        }else{
            $userdata = $this->session->all_userdata();
            $iduser = $this->db->get_where('user',array("email_user"=>$userdata['user']['email']))->row_array();
            $fullname = $this->input->post('fullname');
            $notelp = $this->input->post('notelp');
            $tgljanji = $this->input->post('tgljanji');
            $appt = $this->input->post('appt');
            $data = [
                "id_dokter" => $id,
                "id_user" => $iduser['id_user'],
                "nama_user"=> $fullname,
                "no_user"=>$notelp,
                "tgl_janji"=>$tgljanji,
                "waktu_janji"=>$appt

            ];
            $cekdb = $this->db->insert('janji',$data);
            if($cekdb){
                $dokter = $this->db->get_where('dokter',array("id_dokter"=>$id))->row_array();
                $this->m_user->sendmail($dokter['email_dokter'],"Janji Baru Dengan ".$fullname,"Nama Pasien : ".$fullname."<br>"."Tanggal Janji : ".$tgljanji."<br>"."Waktu : ".$appt."<br>"."Lokasi : Rumah sakit");
                $this->m_user->sendmail($userdata['user']['email'],"Janji Dengan ".$dokter['nama_dokter'],"Nama Pasien : ".$fullname."<br>"."Tanggal Janji : ".$tgljanji."<br>"."Waktu : ".$appt."<br>"."Lokasi : Rumah sakit");
                redirect('janji/');
            }else{
                redirect('caridokter');
            }

            
            
        }
        

    }
}