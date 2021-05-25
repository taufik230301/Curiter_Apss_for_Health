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
        <h3>Daftar Rumah Sakit</h3>
        <br>
        <button type="button" class="button_tambah" data-toggle="modal" data-target="#tambah">Tambah Rumah Sakit</button>
        <br></br>
        <table class="table table-bordered" id="table">
          <thead>
            <tr>
              <th>No</th>
              <th>ID RS</th>
              <th>Nama RS</th>
              <th>Alamat</th>
              <th>Nomor</th>
              <th>Tentang</th>
              <th>Fasilitas</th>
              <th>Poliklinik</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1;
            foreach ($rs as $r) {

              ?>
            <tr>
              <form>
                <td><?= $no++;  ?></td>
                <td><?php echo $r['id_rs']; ?></td>
                <td><?php echo $r['nama_rs']; ?></td>
                <td><?php echo $r['alamat_rs']; ?></td>
                <td><?php echo $r['telp_rs']; ?></td>
                <td><?php echo $r['tentang_rs']; ?></td>
                <td><?php echo $r['fasilitas_rs']; ?></td>
                <td><?php echo $r['nama_poli']; ?></td>
                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $r['id_rs'] ?>"><i class="fas fa-edit"></i></button></td>
                <td><a href="<?= base_url(); ?>admin/rs/hapus/<?= $r['id_rs'] ?>" type="button" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-trash"></i></a></td>
              </form>
            </tr>
            <!-- ubah -->
            <div class="modal fade" id="edit<?= $r['id_rs'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><?="Update Data Rumah Sakit ".$r['nama_rs']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <div class="boxsetting">
                      <br>
                      <form action="<?= base_url(); ?>admin/rs/edit/<?= $r['id_rs'] ?>" method="post">
                        <input type="hidden" name="id" value="<?= $r['id_rs'] ?>">

                        <div class="form-group">
                          <label for="formGroupExampleInput">Nama</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama RS" name="nama"  value="<?php echo $r['nama_rs'] ?>" required>
                            <!-- <label for="nim">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $r['nama_rs']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama_rs') ?>.</small> -->
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Alamatr</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat RS" name="alamat"  value="<?php echo $r['alamat_rs'] ?>" required>
                            <!-- <label for="text">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $r['alamat_rs']; ?>">
                            <small class="form-text text-danger"><?= form_error('alamat_rs') ?>.</small> -->
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Kota</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kota" name="kota"  value="<?php echo $r['kota'] ?>" required>
                            <!-- <label for="text">Kota</label>
                            <input type="text" class="form-control" id="kota" name="kota" value="<?= $r['kota']; ?>">
                            <small class="form-text text-danger"><?= form_error('kota') ?>.</small> -->
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput">NO Telp</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="No Telp" name="no"  value="<?php echo $r['telp_rs'] ?>" required>
                            <!-- <label for="nama">No Telp</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $r['telp_rs']; ?>">
                            <small class="form-text text-danger"><?= form_error('telp_rs') ?>.</small> -->
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Tentang</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tentang RS" name="tentang"  value="<?php echo $r['tentang_rs'] ?>" required>
                            <!-- <label for="text">Fasilitas</label>
                            <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?= $r['fasilitas_rs']; ?>">
                            <small class="form-text text-danger"><?= form_error('fasilitas_rs') ?>.</small> -->
                        </div>
                        <label for="formGroupExampleInput">Fasilitas</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Fasilitas RS" name="fasilitas"  value="<?php echo $r['fasilitas_rs'] ?>" required>
                        <!-- <div class="form-group">
                            <label for="text">Poliklinik</label>
                            <input type="text" class="form-control" id="poli" name="poli" value="<?= $r['poliklinik_rs']; ?>">
                            <small class="form-text text-danger"><?= form_error('poliklinik_rs') ?>.</small>
                        </div> -->
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>
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
     <!-- Modal Tambah Mahasiswa -->
      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <center><h2>TAMBAH DATA RUMAH SAKIT</h2></center>
            </div>
            <div class="modal-body">
            <!-- isi form ini -->
            <form method="POST" action="<?= base_url(); ?>admin/rs/tambah">
              <div class="form-group">
                <label for="formGroupExampleInput2">Poliklinik</label>
                <select class="form-control" id="formGroupExampleInput" name="rs" required>
                <?php foreach ($poli as $p ) {?>
                  <option value="<?php echo $p->id_poli; ?>" ><?php echo $p->nama_poli;  ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Nama Rumah Sakit</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Rumah Sakit" name="nama" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Alamat</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat" name="alamat" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Kota</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kota" name="kota" required>
              </div>
               <div class="form-group">
                <!-- ini gatau kan increment yak -->
                <label for="formGroupExampleInput">No Telp</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="No Telp" name="no" required >
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Tentang</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tentang RS" name="tentang" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Fasilitas</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Fasilitas RS" name="fasilitas" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <input  type="submit" class="btn btn-primary" id="tambah" value="Submit" placeholder="Simpan">
            </form>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>
