<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/m_admin');
        $this->load->model('m_user');
    }
    public function login(){
        $data['title'] = 'Curiter | Sign In';
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        if($this->form_validation->run() == false){
            $this->load->view('v_signinadmin',$data);
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($username === 'admin'){
                // user ada
                if($password === "123"){
                    $dataA = [
                    	"nama" => 'admin',
                        "username" => '123'
                    ];
                    $this->session->set_userdata($dataA);
                    //$data['title'] = 'Curiter | Admin';
                    // redirect('home');
                    redirect('admin/dokter/index');
                    //$cek['d'] = $this->m_user->get_dokter();
                    //$this->load->view('header_page_admin',$data);
                    //$this->load->view('admin/v_datadokter',$cek);
                    //$this->load->view('footer_page');
                }else{
                    $this->session->set_flashdata('flash','Wrong Password !');
                    redirect('admin/admin/login');
                }
            }
        }
    }
    public function logout(){
        $array_items = array('admin');
        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('flash','Anda Berhasil Logout ! :)');
        redirect('admin/admin/login');
    	/*$this->session->session_destroy();
    	redirect(site_url('admin/admin/login'));*/
    }
}
