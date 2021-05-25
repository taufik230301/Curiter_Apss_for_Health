<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>">
    <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/js/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/all.min.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/all.min.css') ?>" >
    <script src='https://kit.fontawesome.com/a076d05399.js'></script> -->

  <script src="<?=base_url('assets/js/fontawesome-all.js');?>">
	</script>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/custom.css');?>">
	<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>">
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
    <?php if ($this->session->flashdata('flash')) : ?>
					<div class="row mt-3">
						<div class="col-md-6">
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?= $this->session->flashdata('flash'); ?>
								<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button> -->
							</div>
						</div>
					</div>
					<?php endif; ?>

          <!-- Modal Tambah User -->
      <div class="box">
      
        <h3>Daftar User</h3>
        <br>
        <button type="button" class="button_tambah" data-toggle="modal" data-target="#tambah">Tambah User</button>
        <br></br>
        <table class="table table-bordered" id="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Email User</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach ($u as $u) {

                ?>
            <tr>
              <form>
                <td><?= $no++; ?></td>
                <td><?php echo $u['nama_user']; ?></td>
                <td><?php echo $u['email_user'] ?></td>
                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $u['id_user'] ?>"><i class="fas fa-edit"></i></button></td>
                <td><a href="<?= base_url(); ?>admin/user/hapus/<?= $u['id_user'] ?>" type="button" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-user-times"></i></a></td>
              </form>
            </tr>

       
      </div>
    </div>
      <!-- Modal Tambah Mahasiswa -->
      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <center><h2>TAMBAH DATA USER</h2></center>
            </div>
            <div class="modal-body">
            <!-- isi form ini -->
            <form method="POST" action="<?= base_url(); ?>admin/user/tambah">
              <div class="form-group">
                <label for="formGroupExampleInput">Nama User</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Pengguna" name="fullname" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Email</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email" name="email" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Password" name="password" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Password" name="repassword" required>
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

       <!-- Modal Ubah Dokter -->
                <div class="modal fade" id="edit<?= $u['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"><?="Update Data User ".$u['nama_user']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                        <div class="modal-body">
                          <div class="boxsetting">
                            <br>
                            <form action="<?= base_url() ?>admin/user/edit/<?= $u['id_user'] ?>" method="post">
                              <input type="hidden" name="id" value="<?= $u['id_user'] ?>">
                              <div class="form-group">
                                  <label for="formGroupExampleInput">Nama User</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nama" name="fullname"  value="<?php echo $u['nama_user'] ?>" required>
                              </div>
                              <div class="form-group">
                                  <label for="formGroupExampleInput">Email</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="email" name="email"  value="<?php echo $u['email_user'] ?>" required>
                              </div>
                              <div class="form-group">
                                  <label for="formGroupExampleInput">Password</label>
                                  <input type="password" class="form-control" id="formGroupExampleInput" placeholder="email" name="password"  value="<?php echo $u['password_user'] ?>" required>
                              </div>
                              </div>
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
  </body>
</html>
