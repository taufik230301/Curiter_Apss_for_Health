<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Janji extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
        $this->load->model('m_janji');
        $this->load->model('m_dokter');
        $this->load->model('m_rs');
    }
    public function index(){
        $this->m_user->checklogin();
        $data['title'] = "Curiter | Buat Janji";
        $id = $this->session->all_userdata();
        $data['janji'] = $this->m_janji->getjanji($id['user']['id']);
        $this->load->view('header_page',$data);
        $this->load->view('v_listjanji',$data);
        $this->load->view('footer_page');
    }
    public function update($id){
        $tgl = $this->input->post('ubah-tgl');
        $jam = $this->input->post('ubah-jam');
        if($tgl && $jam){
            $data =[
                "tgl_janji"=>$tgl,
                "waktu_janji"=>$jam
            ];
        }else if($tgl){
            $data = [
                "tgl_janji"=>$tgl
            ];
        }else if($jam){
            $data = [
                "waktu_janji"=>$jam
            ];
        }
        
        $this->db->where("id_janji",$id);
        $this->db->update('janji',$data);
        redirect('janji/','refresh');
    }
    public function hapus($id){
        $this->db->where("id_janji",$id);
        $this->db->delete('janji');
        redirect('janji/','refresh');
    }
}
