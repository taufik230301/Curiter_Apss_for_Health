<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('m_user');
    }

    public function welcome(){
       $data['title'] = "Curiter | Home";
       $data['artikel'] = $this->db->get('artikel')->result_array();
        $this->load->view('welcome_header_page',$data);
        $this->load->view('v_main_welcome',$data);
        $this->load->view('footer_page');
    }
    public function index($cek = NULL){
        $this->m_user->checklogin();
        $data['title'] = "Curiter | Home";
        if($data){
          $data['artikel'] = $this->m_user->getartikel($cek);
        }else{
          $data['artikel'] = $this->db->get('artikel')->result_array();
        }
        
        $this->load->view('header_page',$data);
        $this->load->view('v_main',$data);
        $this->load->view('footer_page');
    }
    public function logout(){
		$array_items = array('user');
    $this->session->unset_userdata($array_items);
    $this->session->set_flashdata('flash','Anda Berhasil Logout ! :)');
		redirect('user/signin');
	}
  public function CardTanyaDokter()
  {
    $data['title'] = "Curiter | Cari Dokter";
    $this->load->view('header_page',$data);
    $this->load->view('v_tanyadokter');
    $this->load->view('footer_page');
  }
  public function settings(){
    $data['title'] = "Curiter | Settings";
    $data['userdata'] = $this->session->all_userdata();
    $data['userdisp'] = $this->db->get_where('user',["email_user"=>$data['userdata']['user']['email']])->row_array();
    $this->load->view('header_page',$data);
    $this->load->view('v_settings',$data);
    $this->load->view('footer_page');
  }
  public function updatedata(){
    $this->m_user->updateUser();
    $array_items = array('user');
    $this->session->unset_userdata($array_items);
    $this->session->set_flashdata('flash','Akun anda telah terupdate :)');
    redirect('user/signin');
  }

  public function artikel($id)
  {
    $artikel = $this->db->get_where('artikel',array("id_artikel"=>$id))->row_array();
    $data['title'] = "Curiter | ".$artikel['judul_artikel'];
    $data['artikel'] = $artikel;
    $this->load->view('header_page',$data);
    $this->load->view('v_article',$data);
    $this->load->view('footer_page');

  }

  
  public function artikel_user($id)
  {
    $artikel = $this->db->get_where('artikel',array("id_artikel"=>$id))->row_array();
    $data['title'] = "Curiter | ".$artikel['judul_artikel'];
    $data['artikel'] = $artikel;
    $this->load->view('welcome_header_page',$data);
    $this->load->view('v_article_user',$data);
    $this->load->view('footer_page');

  }
  public function hapusakun(){
    $data = $this->session->all_userdata();
    $this->db->where('id_user',$data['user']['id']);
    $this->db->delete('user');
    $array_items = array('user');
    $this->session->unset_userdata($array_items);
    $this->session->set_flashdata('flash','Akun anda telah terhapus :(');
    redirect('user/signin');
  }
}
