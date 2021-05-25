<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_user');
        $this->load->library('session');
        if ($this->session->has_userdata('user')){
            redirect('home');
        }
    }

    public function signin(){
        $data['title'] = 'Curiter | Sign In';
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');
        if($this->form_validation->run() == false){
            $this->load->view('v_signin',$data);
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->m_user->verify($email);
            if ($user){
                if($password === $user['password_user']){
                    $data['user'] = [
                        "id" => $user['id_user'],
                        "fullname" => $user['nama_user'],
                        "email" => $user['email_user'],
                        "password" => $user['password_user']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home/');
                }else{
                    $this->session->set_flashdata('flash','Wrong Password !');
                    redirect('user/signin');
                }
            }else{
                $this->session->set_flashdata('flash','Unregistered user !');
                redirect('user/signin');
            }
        }

    }

    public function signup(){
        $data['title'] = 'Curiter | Sign Up';
        $this->form_validation->set_rules('fullname','Fullname','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim|min_length[6]|matches[repassword]',[
            'matches' => "password doesn't match !!!"
        ]);
        $this->form_validation->set_rules('repassword','Repassword','required|trim|min_length[6]|matches[password]',[
            'matches' => "password doesn't match !!!"
        ]);

        if ($this->form_validation->run() == false){
            $this->load->view('v_signup',$data);
        }else{
            $this->m_user->regis();
            $email = $this->input->post('email');
            $nama = $this->input->post('fullname');
            $this->m_user->sendmail($email,"Registrasi Akun Curiter Berhasil !","Terima kasih telah mendaftarkan akun di Curiter!<br><br>E-mail ini menandakan bahwa E-mail anda telah terdaftar<br>");
            // $this->m_user->sendmail($email,"Keju Khas Malangnya KAKAK !","Terima kasih telah mendaftarkan akun di Curiter!<br><br>E-mail ini menandakan bahwa E-mail anda telah terdaftar<br>");
            $this->session->set_flashdata('flash','Registered Success !');
            redirect('user/signin');
        }
    }

}
