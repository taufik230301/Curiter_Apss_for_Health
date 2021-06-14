<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Artikel extends CI_Controller
{

    public function __construct(){
        parent::__construct();
		$this->load->model('admin/model_artikel');
		$this->load->library('upload');
    }
    public function index(){
		$data['title'] = 'Curiter | Data Artikel';
		$data['artikel'] = $this->model_artikel->get_artikel();
		$this->load->view('header_page_admin',$data);
		$this->load->view('admin/v_dataartikel',$data);
		$this->load->view('footer_page');
	}

	public function tambah(){

		$kategori_artikel = $this->input->post('kategori_artikel', true);
		$judul_artikel = $this->input->post('judul_artikel', true);
		$konten_artikel = $this->input->post('konten_artikel', true);
		$sumber_artikel = $this->input->post('sumber_artikel', true);
		 
	  $config['upload_path'] = './assets/artikel';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['gambar_artikel']['name'];

      $this->upload->initialize($config);

	    if (!empty($_FILES['gambar_artikel']['name'])) {
	        if ( $this->upload->do_upload('gambar_artikel') ) {
	            $foto = $this->upload->data();
	            $data = array(
	                    	'kategori_artikel'       => $kategori_artikel,
							  'judul_artikel'			=> $judul_artikel,
							  'konten_artikel'			=> $konten_artikel,
							  'sumber_artikel'			=> $sumber_artikel,
							  'gambar_artikel'       => $foto['file_name'],
	                        );
							$this->model_artikel->tambah_artikel($data);
              redirect('admin/artikel/index');
	        }else {
                 $this->load->view('gagal');
	        }
	    }else {
         
          $this->load->view('gagal');
	    }
	}

	public function edit(){
		$id_artikel = $this->input->post('id_artikel', true);
		$kategori_artikel = $this->input->post('kategori_artikel', true);
		$judul_artikel = $this->input->post('judul_artikel', true);
		$konten_artikel = $this->input->post('konten_artikel', true);
		$sumber_artikel = $this->input->post('sumber_artikel', true);
		
		$path = './assets/artikel/';
		$kondisi = array('id_artikel' => $id_artikel);

		// ambil foto
		$config['upload_path'] = './assets/artikel';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048'; // 2MB
		$config['max_widht'] = '4480'; // Pixel
		$config['max_height'] = '4480'; //Pixel
	$config['file_name'] = $_FILES['fotopost']['name'];

      $this->upload->initialize($config);

	    if (!empty($_FILES['fotopost']['name'])) {
	        if ( $this->upload->do_upload('fotopost') ) {
	            $foto = $this->upload->data();
	            $data = array(
	                        'kategori_artikel'       => $kategori_artikel,
							  'judul_artikel'			=> $judul_artikel,
							  'konten_artikel'			=> $konten_artikel,
							  'sumber_artikel'			=> $sumber_artikel,
							  'gambar_artikel'       => $foto['file_name'],
	                        );
              // hapus foto pada direktori
              @unlink($path.$this->input->post('filelama'));

							$this->model_artikel->update_artikel($data,$kondisi);
              redirect('admin/artikel/index');
	        }else {
                 echo "Upload Gagal";
	        }
	    }else {
	          $this->load->view('gagal');
	    }
	}

	public function hapus($id, $data){
		$path = './assets/artikel/';
      	@unlink($path.$data);

		$this->model_artikel->hapus_artikel($id);
		redirect('admin/artikel/index');
	}
}



?>