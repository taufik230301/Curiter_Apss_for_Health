<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class User extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/model_user');
	}

	public function index(){
		$data['title'] = 'Curiter | Data User';
		$data['u'] = $this->model_user->get_user();
		$this->load->view('header_page_admin',$data);
		$this->load->view('admin/v_datauser',$data);
		$this->load->view('footer_page');
	}

	 public function tambah(){
        $data['title'] = 'Curiter | Sign Up';
        $this->form_validation->set_rules('fullname','Fullname','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email_user]',[
            'is_unique' => "email is already registered !"
        ]);
        $this->form_validation->set_rules('password','Password','required|trim|min_length[6]|matches[repassword]',[
            'matches' => "password doesn't match !!!"
        ]);
        $this->form_validation->set_rules('repassword','Repassword','required|trim|min_length[6]|matches[password]',[
            'matches' => "password doesn't match !!!"
        ]);

        if ($this->form_validation->run() == false){
            $this->load->view('admin/v_datauser',$data);
        }else{
            $this->model_user->regis();
            $email = $this->input->post('email');
            $nama = $this->input->post('fullname');
            $this->model_user->sendmail($email,"Registrasi Akun Curiter Berhasil !","Terima kasih telah mendaftarkan akun di Curiter!<br><br>E-mail ini menandakan bahwa E-mail anda telah terdaftar<br>");
            // $this->m_user->sendmail($email,"Keju Khas Malangnya KAKAK !","Terima kasih telah mendaftarkan akun di Curiter!<br><br>E-mail ini menandakan bahwa E-mail anda telah terdaftar<br>");
            $this->session->set_flashdata('flash','Data Berhasil Diubah !');
            redirect('admin/user/index');
        }
    }

    public function edit($id){
        $data = [
			'id_user' => $this->input->post('id', true),
			'nama_user' => $this->input->post('fullname', true),
			'email_user' =>$this->input->post('email', true),
    		'password_user' => $this->input->post('password',true),
		];
        $this->model_user->update_user($id, $data);
        $this->session->set_flashdata('flash','Data Berhasil Diubah !');
		redirect('admin/user/index');
    }

    public function hapus($id){
        $this->model_user->delete_user($id);
        $this->session->set_flashdata('flash','Data Berhasil Dihapus !');
        redirect('admin/user/index');
    }

}

