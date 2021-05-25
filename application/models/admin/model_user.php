<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Model_user extends CI_Model
{
	public function get_user(){
		return $this->db->get('user')->result_array();
	}
	
	 public  function regis(){
        $data = [
            "nama_user" => $this->input->post("fullname"),
            "email_user" => $this->input->post("email"),
            "password_user" => $this->input->post("password"),
        ];
        return $this->db->insert('user',$data);
	}
	
	  public function sendmail($email,$subject,$pesan)
    {
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'hello.aidok@gmail.com',  // Email gmail
            'smtp_pass'   => 'Curiter#123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('hello.aidok@gmail.com', 'Curiter');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan


        // Subject email
        $this->email->subject($subject);

        // Isi email
        $this->email->message($pesan);
        $this->email->send();
        // Tampilkan pesan sukses atau error
    }

    	public function update_user($id, $data){
		/*$data = [
			'nama_rs' => $this->input->post('nama',true),
			'alamat_rs' => $this->input->post('alamat',true),
			'kota' => $this->input->post('kota',true),
			'telp_rs' =>$this->input->post('telp',true),
			'fasilitas_rs' =>$this->input->post('fasilitas',true),
			//'poliklinik_rs' => $this->input->post('poli',true),
		];*/
		$this->db->where('id_user', $id);
		$this->db->update('user',$data);
  }
  
  public function delete_user($id){
    $this->db->where('id_user',$id);
    return $this->db->delete('user');
  }
}