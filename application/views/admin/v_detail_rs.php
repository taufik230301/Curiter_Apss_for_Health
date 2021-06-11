<style>

/* CSS UNTUK MODAL BOOSTRAP */
.boxsetting{
  width: 300px;
  height: 550px;
  padding: 0 30px 30px 30px ;
  border: 2px solid red;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  width: 500px;
  align-items: center;
  margin-top: 5px;
}

.boxsetting-poli{
  width: 300px;
  height: 200px;
  padding: 0 30px 30px 30px ;
  
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  width: 500px;
  align-items: center;
  margin-top: 5px;
}

.formsetting{
  /* margin-top: 100px; */
  font-weight: 500;
  font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';
}
.inputsetting {
  width: 60%;
  padding: 6px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid grey;
  margin-left: 20px;
  margin-top: 1px;
}
.inputsetting:active, .inputsetting:hover{
  border-color: #ec4638;
}
.label{
  padding-top: 5px;
  margin-top: 10px;
  /* margin-left: 20px; */
}
.button_update{
  margin: 20px 0 ;
  align-items: center;
  padding: 10px;
  background-color: transparent;
  border: none;
  border: 2px solid #ec4638;
  color: #ec4638;
  border-radius: 20px;
  font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';
  font-size: 16px;
}
.button_update:hover{
  background: #ec4638;
  color: #fff;
  cursor: pointer;
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



<div class="container">
  <div class="sticky">
  <h3>Data Poliklinik</h3>
        <br>
        <button type="button" class="button_tambah" data-toggle="modal" data-target="#tambah">Tambah PoliKlinik</button>
        <br></br>
  </div>
  <!-- <div class="konten-atas">
  <section id='konten-kiri-atas' class ="konten-sisikiri"style="margin-top:10px;">
        <img src="<?php echo base_url(); ?>/Assets/rs.jpeg" class="card-img" alt="..." >
  </section>
  <div class="Tentang">
    <h4> <?="Tentang Rumah Sakit ".$rsid['nama_rs']?></h4>
    <p><?=$rsid['tentang_rs']?></p>
    <table style="width:100%;">
      <tr>
        <td><p class="card-text" style="text-align:left;opacity:0.7"> <img src="<?php echo base_url(); ?>/Assets/location.png" style="width:20px;height:20px;"> <?= "Kota ".$rsid['kota']?></p></td>
        <td><p class="card-text" style="text-align:left;opacity:0.7"> <img src="<?php echo base_url(); ?>/Assets/call-icon.png" style="width:20px;height:20px;"> <?= $rsid['telp_rs']?></p></td>
      </tr>
    </table>
    <h4> Fasilitas</h4>
    <?php $fasilitas = $rsid['fasilitas_rs'];
        $split = explode(',',$fasilitas);
    for ($i=0; $i < count($split) ; $i++) {?>
    <div class="kolom-fasilitas">
            <p><?= $split[$i]; ?></p>
        </div>
    <?php } ?>
    </div>
  </div>  -->
  <div class="konten-bawah">
    <div class="konten-bawah-poliklinik">
      <h3>Poliklinik</h3>
      <div class="konten-poli" style="overflow:auto; height:700px;">
            <?php foreach($poli as $p) {?>
            <div class="card mb-3" style="width:inherit;height: auto; margin-right: 80px;margin-left:20px;">
  <div class="row no-gutters" >
  <div class="col-md-2"  >
      <img src="<?php echo base_url(); ?>/Assets/rs.jpeg" class="card-img" alt="..." >
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title" style="text-align:left;"><?= $p['nama_poli']?></h5>
        <!-- <p class="card-text" style="text-align:left;">Diisi deskripsi ringan dari tiap jenis polinya</p> -->
      </div>
  </div>
  <div class="col-md-4"style="margin-top: 120px;" >
    <button class="button-poli" type="button" name="lihat_detail" data-toggle="modal" data-target="#poli<?=$p['id_poli']?>" style="">Lihat Detail</button>

  </div>
  </div>
</div>

<div class="modal fade" id="poli<?=$p['id_poli']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?=$p['nama_poli']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="align-items: center;padding:0;border-radius: 25px;">
        <div class="boxsetting-poli">
          <h4>Definisi Singkat <?=$p['nama_poli']?> </h4>
          <p><?=$p['tentang_poli']?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>
  </div>

</div>



    <div class="konten-bawah-dokter" >
      <h3>Dokter</h3>
      <div class="konten-dokter" style="overflow:auto; height:700px;">
            <?php foreach($drrs as $dr) {?>
            <div class="card mb-3" style="width:inherit;height: auto; margin-right: 80px;margin-left:20px;">
  <div class="row no-gutters" >
  <div class="col-md-2"  >
      <img src="<?php echo base_url(); ?>/Assets/doctor.png" class="card-img" alt="..." >
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title" style="text-align:left;"><?= $dr['nama_dokter']?></h5>
        <p class="card-text" style="text-align:left;opacity:0.7"> <?= "Spesialis ".$dr['spesialis_dokter']?> </p>
      </div>
  </div>
  <!-- <div class="col-md-4"style="margin-top: 120px;" >
    <button class="button-janji" data-toggle="modal" type="button" name="button_janji" data-target="#dokter<?=$dr['id_dokter']?>">Buat Janji</button>

  </div> -->
  </div>
</div>

<div class="modal fade" id="dokter<?=$dr['id_dokter']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?="Buat Janji Dengan ".$dr['nama_dokter']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('caridokter/janji/'.$dr['id_dokter'])?>">
      <div class="modal-body" style="align-items: center;padding:0;border-radius: 25px;">
        <div class="boxsetting">
          <br>
          <label for="fullname" class="label">Nama Lengkap</label>
          <input type="text" class="inputsetting" id="fullname" name="fullname">
          <label for="notelp" class="label">Nomor Telepon</label>
          <input type="text" class="inputsetting" id="email" name="notelp">
          <label for="tgljanji" class="label">Tanggal Janji</label>
          <input type="date" class="inputsetting" id="tgljanji" name="tgljanji">
          <label for="appt" class="label">Pilih Waktu</label>
          <input type="time" class="inputsetting" id="appt" name="appt">
          <br>
          <button type="submit" value="Buat Janji" class="button_update">Buat Janji</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
      </div>
    </div>

  </div>
  </div>
 <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <center><h2>TAMBAH DATA RUMAH SAKIT</h2></center>
            </div>
            <div class="modal-body">
            <!-- isi form ini -->
          <?php echo form_open_multipart('admin/rs/tambah_poliklinik'); ?>
            <input type="hidden" name="id" value="<?= $rsid['id_rs'] ?>">
              <div class="form-group">
                <label for="formGroupExampleInput2">Poliklinik</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Poliklinik" name="nama_poli" required>
              </div>
               <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi Poliklinik</label>
                <br>
                    <small>Minimal 200 Kata</small>
                <textarea id="konten_artikel" name="deskripsi" rows="4" cols="50" >
                </textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <input  type="submit" class="btn btn-primary" id="tambah" value="Submit" placeholder="Simpan">
            <?= form_close();?>
            </div>
          </div>
        </div>
      </div>