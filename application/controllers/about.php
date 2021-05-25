<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
    }
    public function index(){
        $this->m_user->checklogin();
        $data['title'] = "Curiter | About";
        $this->load->view('header_page',$data);
        $this->load->view('v_about');
        $this->load->view('footer_page');
    }
}