<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Artikel extends CI_Controller
{

    public function __construct(){
        parent::__construct();
		$this->load->model('admin/model_artikel');
    }
    public function index(){
		$data['title'] = 'Curiter | Data Artikel';
		$data['artikel'] = $this->model_artikel->get_artikel();
		$this->load->view('header_page_admin',$data);
		$this->load->view('admin/v_dataartikel',$data);
		$this->load->view('footer_page');
	}
}



?>