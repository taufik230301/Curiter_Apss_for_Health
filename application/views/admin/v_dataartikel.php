<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/all.min.js') ?>"></script>
    <script src="<?=base_url('assets/js/fontawesome-all.js');?>">
	</script>

	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>">
	</script>
    <title>Curiter | Admin</title>
    <style>
      .bodiadm{
        margin-top: 90px;
      }
      .button_tambah{
  			background-color: #FFFFFF;
  			color: #ec4638;
  			border: 2px solid #ec4638;
  			padding: 5px 10px;
  			margin: 0px 0px 4px 0px;
  			font-size: 15px;
  			border-radius: 25px;
  		}
  		.button_tambah:hover{
  			background-color: #ec4638;
  			color: #FFFFFF;
  		}
    </style>
  </head>
  <body class="bodiadm">
    <div class="container">
      <div class="box">
        <h3>Data Artikel</h3>
        <br>
        <button type="button" class="button_tambah" data-toggle="modal" data-target="#tambah">Tambah Artikel</button>
        <br></br>
        <table class="table table-bordered" id="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori Artikel</th>
              <th>Judul Artikel</th>
              <th>Konten Artikel</th>
              <th>Sumber Artikel</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach ($artikel as $a) {

                ?>
            <tr>
              <form>
                <td><?= $no++; ?></td>
                <td><?php echo $a['kategori_artikel'] ?></td>
                <td><?php echo $a['judul_artikel']; ?></td>
                <td>     
                <?php
                  $split = explode('.',$a['konten_artikel'])
                  ?>
                  <p><?= $split[0].".".$split[1]."..." ?></p></td>
                <td><?php echo $a['sumber_artikel'] ?></td>
                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $a['id_artikel'] ?>"><i class="fas fa-edit"></i></button></td>
                <td><a href="<?= base_url(); ?>admin/artikel/hapus/<?= $a['id_artikel']?>/<?= $a['gambar_artikel']?>" type="button" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-trash text-white"></i></a></td>
              </form>
            </tr>
     
     

 <!-- Modal Ubah Dokter -->
                <div class="modal fade" id="edit<?= $a['id_artikel'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"><?="Update Data Dokter ".$a['judul_artikel']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                        <div class="modal-body">
                          <div class="boxsetting">
                            <br>
                           <form action="<?=base_url()?>admin/artikel/edit" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_artikel" value="<?= $a['id_artikel']?>">
                              <div class="form-group">
                                  <label for="formGroupExampleInput">Kategori Artikel</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kategori Artikel" name="kategori_artikel"  value="<?php echo $a['kategori_artikel'] ?>" required>
                              </div>
                              <div class="form-group">
                                  <label for="formGroupExampleInput">Judul Artikel</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Judul Artikel" name="judul_artikel"  value="<?php echo $a['judul_artikel'] ?>" required>
                              </div>
                              <div class="form-group">
                                  <label for="formGroupExampleInput">Konten Artikel</label>
                                   <br>
                                  <small>Minimal 200 Kata</small>
                                <textarea id="konten_artikel" name="konten_artikel" rows="4" cols="50" value=""><?php echo $a['konten_artikel']?>"
                                </textarea>
                              </div>
                              <div class="form-group">
                                  <label for="formGroupExampleInput">Sumber Artikel</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Sumber Artikel" name="sumber_artikel"  value="<?php echo $a['sumber_artikel'] ?>" required>
                              </div>
                              <div class="form-group">
                                  <label for="formGroupExampleInput">Gambar Artikel</label>
                                  <input type="hidden" name="filelama" value="<?= $a['gambar_artikel']?>">
                                  <input type="file" class="form-control" id="formGroupExampleInput" placeholder="Sumber Artikel" name="fotopost"  required>
                              </div>
                              
                              <button type="submit" name="submit" value="Submit" class="btn btn-primary float-right">Ubah Data</button>
                           </form>
                            <br>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                    
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
        <!-- Tambah Artikel -->
      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <center><h2>TAMBAH DATA RUMAH SAKIT</h2></center>
            </div>
            <div class="modal-body">
            <!-- isi form ini -->
          <?php echo form_open_multipart('admin/artikel/tambah'); ?>
              <div class="form-group">
                <label for="formGroupExampleInput">Kategori Artikel</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kategori Artikel" name="kategori_artikel" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Judul Artikel</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Judul Artikel" name="judul_artikel" required>
              </div>
               <div class="form-group">
                <label for="formGroupExampleInput">Konten Artikel</label>
                <br>
                    <small>Minimal 200 Kata</small>
                <textarea id="konten_artikel" name="konten_artikel" rows="4" cols="50" minlength="200">
                </textarea>
              </div>
                <div class="form-group">
                <label for="formGroupExampleInput">Sumber Artikel</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Sumber Artikel" name="sumber_artikel" required>
              </div>
               <div class="form-group">
                <label for="formGroupExampleInput">Gambar Artikel</label>
                <input type="file" class="form-control" id="formGroupExampleInput" placeholder="Gambar Artikel" name="gambar_artikel" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <input  type="submit" class="btn btn-primary" id="tambah" value="Submit" placeholder="Simpan">
            <?= form_close();?>
            </div>
          </div>
        </div>
      </div>

      
    </div>
  </div>
  </body>
</html>
