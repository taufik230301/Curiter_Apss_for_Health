<title>Latihan-3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>">
  <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/js/jquery.dataTables.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/all.min.js') ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/all.min.css') ?>" >

  <div class="container">
  	<div class="box">
      <h2>Daftar Dokter</h2>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit1">TAMBAH MAHASISWA</button>
      <br><br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Dokter</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>Bio Dokter</th>
            <th>Rumah Sakit</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($dokter as $d ) {?>
          <tr>
            <form action="">
              <td><?php echo $no++ ?></td>
              <td><?php echo $d['id_dokter'] ?></td>
              <td><?php echo $d['nama_dokter'] ?></td>
              <td><?php echo $d['spesialis_dokter'] ?></td>
              <td><?php echo $d['bio_dokter'] ?></td>
              <td><?php echo $d['rs_dokter'] ?></td>
              <!--BUTTON EDIT MAHASISWA-->
              <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $d['nama_dokter'] ?>"><i class="fas fa-user-edit"></i></button></td>
              <td><a type="button" class="btn btn-danger"  href="<?php echo base_url()?>mahasiswa/proses_hapus/<?php echo $d['nama_dokter']?>" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-user-times"></i></a></td>
            </form>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <a type="button" class="btn btn-primary"  href="<?php echo base_url()?>mahasiswa/logout" >LOGOUT</a>
      <a type="button" class="btn btn-primary"  href="<?php echo base_url()?>mahasiswa/pilihan" >Back</a>
    </div>
  </div>
  <!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <center><h2>TAMBAH DATA DOKTER</h2></center>
      </div>
      <div class="modal-body">
      <!-- isi form ini -->
      <form method="POST" action="<?php echo base_url('mahasiswa/proses_tambah'); ?>">
        <div class="form-group">
          <!-- ini gatau kan increment yak -->
          <label for="formGroupExampleInput">ID Dokter</label>
          <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Nim" name="nim" required >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Nama Dokter</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Dokter" name="nama"required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <input  type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Mahasiswa -->

<?php $no=1; foreach ($dokter as $d ) {?>
  <div class="modal fade" id="edit<?php echo $d['id_dokter'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <center><h2>EDIT DATA MAHASISWA <?php echo $d['nim'] ?> </h2></center>
        </div>
        <div class="modal-body">
        <!-- isi form ini -->
        <form method="post" action="<?php echo base_url('mahasiswa/proses_ubah/'.$d['id_dokter']) ?>">
        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="Nim" name="nim" value="<?php echo $d['nim'] ?>"  required>
          <div class="form-group">
            <label for="formGroupExampleInput">Nama</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama" name="nama"  value="<?php echo $d['nama'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <input  type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
