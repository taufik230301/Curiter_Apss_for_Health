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
        <!-- <button type="button" class="button_tambah" data-toggle="modal" data-target="#edit1">Tambah User</button>
        <br></br> -->
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
                <td><?php echo $a['konten_artikel'] ?></td>
                <td><?php echo $a['sumber_artikel'] ?></td>
                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button></td>
                <td><a type="button" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-trash"></i></a></td>
              </form>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
