<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
    public  function regis(){
        $data = [
            "nama_user" => $this->input->post("fullname"),
            "email_user" => $this->input->post("email"),
            "password_user" => $this->input->post("password"),
        ];
        return $this->db->insert('user',$data);
    }
    public function verify($email){
        return $this->db->get_where('user',['email_user'=> $email])->row_array();
    }
    public function checklogin(){
        if (!$this->session->has_userdata('user')){
            $this->session->set_flashdata('flash', 
								 'sesi anda berakhir silahkan login kembali');			
			redirect('user/signin');
			exit;
		}
    }
    public function sendmail($email,$subject,$pesan)
    {
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'taufiiqulhakim23@gmail.com',  // Email gmail
            'smtp_pass'   => 'Iipkoko@34',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('taufiiqulhakim@gmail.com', 'Curiter');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan


        // Subject email
        $this->email->subject($subject);

        // Isi email
        $this->email->message($pesan);
        $this->email->send();
        // Tampilkan pesan sukses atau error
    }
    public function updateUser(){
        $data['update']= [
            "nama_user" => $this->input->post('fullname'),
            "password_user" => $this->input->post('newpassword')
          ];
          $data['sesiuser'] = $this->session->all_userdata();;
          $this->db->where('email_user',$data['sesiuser']['user']['email']);
          return $this->db->update('user',$data['update']);
    }
    public function getartikel($cek){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->like('kategori_artikel',$cek);
        return $this->db->get()->result_array();

    }
}