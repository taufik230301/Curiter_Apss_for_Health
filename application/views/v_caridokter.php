<style>
.boxsetting{
  width: 300px;
  height: 550px;
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
  width: 10em;
}
.button_update:hover{
  background: #ec4638;
  color: #fff;
  cursor: pointer;

}

.list-bayar img{
  width: 90px;
}

.checkmark {
  width: 200px;
  margin: 0 auto;
  padding-top: 40px;
}

.path {
  stroke-dasharray: 1000;
  stroke-dashoffset: 0;
  animation: dash 2s ease-in-out;
  -webkit-animation: dash 2s ease-in-out;
}

.spin {
  animation: spin 2s;
  -webkit-animation: spin 2s;
  transform-origin: 50% 50%;
  -webkit-transform-origin: 50% 50%;
}

/* p {
  font-family: sans-serif;
  color: pink;
  font-size: 30px;
  font-weight: bold;
  margin: 20px auto;
  text-align: center;
  animation: text .5s linear .4s;
  -webkit-animation: text .4s linear .3s;
} */

@-webkit-keyframes dash {
 0% {
   stroke-dashoffset: 1000;
 }
 100% {
   stroke-dashoffset: 0;
 }
}

@keyframes dash {
 0% {
   stroke-dashoffset: 1000;
 }
 100% {
   stroke-dashoffset: 0;
 }
}

@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
  }
}

@keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
  }
}

@-webkit-keyframes text {
  0% {
    opacity: 0; }
  100% {
    opacity: 1;
  }


  @keyframes text {
  0% {
    opacity: 0; }
  100% {
    opacity: 1;
  }
}
</style>

<div class="container" style="margin-top: 90px">
<div class="row">
  <div class="col-md-6">
  <form action=" <?= base_url('caridokter/')?> " method="post">
  <input class="cari-dokter" type="text" name="search" placeholder="Cari Dokter Anda ..." autocomplete="off">
  </form>
  </div>
</div>
  <!-- <?php var_dump($d); ?> -->
      <?php foreach ($d as $d) {?>
      <div class="konten-dokter" style="overflow:auto; height:auto;">
        <div class="card mb-3" style="width:inherit;height: auto; margin-right: 80px;margin-left:20px;">
  <div class="row no-gutters" >
  <div class="col-md-2" >
      <img src="<?php echo base_url(); ?>/Assets/dokter.png" class="card-img" alt="..." >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title" style="text-align:left;"><?php echo $d['nama_dokter']; ?> | <?php echo $d['spesialis_dokter'] ?></h5>
        <!-- <h6 class="card-title">Jenis Spesialis</h6> -->
        <p class="card-text" style="text-align:left;"><?php echo "Rumah Sakit : ".$d['nama_rs']?></p>
        <!-- <a href="#" class="btn btn btn-primary btn-sm active" role="button" aria-pressed="true">Primary link</a> -->
      </div>
  </div>
  <div class="col-md-2"style="margin-top: 120px;" >
    <button class="ml-auto btn btn-primary text-uppercase" type="button" name="button_call" style="border-radius:13px;font-size:13px;background-color:#033D68;border-color:#033D68;"> <a href="<?= $d['website'] ?>" target="_blank"></a> Hubungi</button>
  </div>
</div>
      </div>
</div>


<!-- Modal Form Janji -->
<div class="modal fade" id="edit<?=$d['id_dokter']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?="Buat Janji Dengan ".$d['nama_dokter']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="align-items: center;padding:0;border-radius: 25px;">
        <form method="post" action="<?= base_url('caridokter/janji/'.$d['id_dokter'])?>">
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
          <button id="button-buat-janji<?=$d['id_dokter']?>" type="submit" value="Buat Janji" class="button_update" >Buat Janji</button>
        </div>
      </form>
      </div>

    </div>
  </div>
</div>


<!-- MODAL UNTUK PEMBAYARAN JANJI -->
<div class="modal fade" id="bayar-janji<?=$d['id_dokter']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="text-align:center;"><?="Pilih Metode Pembayaran Untuk Konsultasi Dengan Dokter ".$d['nama_dokter']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="align-items: center;padding:0;border-radius: 25px;">
        <table style="margin: 10px 0px 10px 15px" class="list-bayar">
          <tr>
            <td><input type="radio" id="metode-bayar<?=$d['id_dokter']?>" name="metode-bayar" value="link-aja"><img id="link-aja-img" src="<?php echo base_url(); ?>/Assets/link-aja.png"></td>
            <td> Nominal : <?= "Rp ".$d['harga_dokter']?></td>
          </tr>
          <tr>
            <td><input type="radio" id="metode-bayar<?=$d['id_dokter']?>" name="metode-bayar" value="gopay"><img id="gopay-img" src="<?php echo base_url(); ?>/Assets/gopay.jpg"></td>
            <td> Nominal : <?= "Rp ".$d['harga_dokter']?></td>
          </tr>
          <tr>
            <td><input type="radio" id="metode-bayar<?=$d['id_dokter']?>" name="metode-bayar" value="ovo"><img id="gopay-img" src="<?php echo base_url(); ?>/Assets/ovo.jpg"></td>
            <td> Nominal : <?= "Rp ".$d['harga_dokter']?></td>
          </tr>
          <tr>
            <td><input type="radio" id="metode-bayar<?=$d['id_dokter']?>" name="metode-bayar" value="pulsa"><img id="gopay-img" src="<?php echo base_url(); ?>/Assets/pulsa.png"></td>
            <td> Nominal : <?= "Rp ".$d['harga_dokter']?></td>
          </tr>
        </table>
        <center>
        <button disabled='disabled' type="submit" id="bayar-btn-janji<?=$d['id_dokter']?>" value="bayar" class="button_update" data-toggle="modal" data-target="#acc-bayar-janji<?=$d['id_dokter']?>"data-dismiss="modal">Bayar</button>
      </center>
      </div>

    </div>
  </div>
</div>



<!-- MODAL ACC BAYAR JANJI -->
<div  class="modal fade" id="acc-bayar-janji<?=$d['id_dokter']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">Selamat Pembayaran Anda Sukses</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="align-items: center;padding:0;border-radius: 25px;">
        <center>
          <div class="box-ceklis">
            <div class="checkmark">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          	 viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
          <path class="path" fill="none" stroke="#7DB0D5" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
          	c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
          	c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
          <circle class="path" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
          <polyline class="path" fill="none" stroke="#7DB0D5" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8
          	74.1,108.4 48.2,86.4 "/>

          <circle class="spin" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>

          </svg>
          </div>
      </center>
      </div>
      <center>
      <h5 style="margin:10px 12px 10px 12px;"><?="Dokter  ".$d['nama_dokter']." Sudah Menunggu Anda"?></h5>
      <button type="submit" value="masuk-chat" class="button_update"  data-toggle="modal" data-target="#edit<?=$d['id_dokter']?>" data-dismiss="modal">Buat Janji</button>
    </center>
    </div>
  </div>
</div>


<!-- MODAL UNTUK PEMBAYARAN CHAT -->
<div class="modal fade" id="bayar<?=$d['id_dokter']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="text-align:center;"><?="Pilih Metode Pembayaran Untuk Konsultasi Dengan Dokter ".$d['nama_dokter']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="align-items: center;padding:0;border-radius: 25px;">
        <table style="margin: 10px 0px 10px 15px" class="list-bayar">
          <tr>
            <td><input type="radio" id="metode-bayar<?=$d['id_dokter']?>" name="metode-bayar" value="link-aja"><img id="link-aja-img" src="<?php echo base_url(); ?>/Assets/link-aja.png"></td>
            <td> Nominal : <?= "Rp ".$d['harga_dokter']?></td>
          </tr>
          <tr>
            <td><input type="radio" id="metode-bayar<?=$d['id_dokter']?>" name="metode-bayar" value="gopay"><img id="gopay-img" src="<?php echo base_url(); ?>/Assets/gopay.jpg"></td>
            <td> Nominal : <?= "Rp ".$d['harga_dokter']?></td>
          </tr>
          <tr>
            <td><input type="radio" id="metode-bayar<?=$d['id_dokter']?>" name="metode-bayar" value="ovo"><img id="gopay-img" src="<?php echo base_url(); ?>/Assets/ovo.jpg"></td>
            <td> Nominal : <?= "Rp ".$d['harga_dokter']?></td>
          </tr>
          <tr>
            <td><input type="radio" id="metode-bayar<?=$d['id_dokter']?>" name="metode-bayar" value="pulsa"><img id="gopay-img" src="<?php echo base_url(); ?>/Assets/pulsa.png"></td>
            <td> Nominal : <?= "Rp ".$d['harga_dokter']?></td>
          </tr>
        </table>
        <center>
        <button disabled='disabled' type="submit" id="bayar-btn<?=$d['id_dokter']?>" value="bayar" class="button_update" data-toggle="modal" data-target="#acc-bayar<?=$d['id_dokter']?>"data-dismiss="modal">Bayar</button>
      </center>
      </div>

    </div>
  </div>
</div>

<!-- MODAL ACC BAYAR CHAT -->
<div  class="modal fade" id="acc-bayar<?=$d['id_dokter']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">Selamat Pembayaran Anda Sukses</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="align-items: center;padding:0;border-radius: 25px;">
        <center>
          <div class="box-ceklis">
            <div class="checkmark">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          	 viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
          <path class="path" fill="none" stroke="#7DB0D5" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
          	c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
          	c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
          <circle class="path" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
          <polyline class="path" fill="none" stroke="#7DB0D5" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8
          	74.1,108.4 48.2,86.4 "/>

          <circle class="spin" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>

          </svg>
          </div>
      </center>
      </div>
      <center>
      <h5 style="margin:10px 12px 10px 12px;"><?="Dokter  ".$d['nama_dokter']." Sudah Menunggu Anda"?></h5>
      <a href="<?= "https://wa.me/".$d['no_dokter']."?text=ai ".$d['nama_dokter']?>" target="_blank"><button type="submit" value="masuk-chat" class="button_update"  data-target="#acc-bayar<?=$d['id_dokter']?>">Mulai Konsultasi</button></a>
    </center>
    </div>
  </div>
</div>


<script>
        $("input:radio").change(function(){$("#bayar-btn<?=$d['id_dokter']?>").prop("disabled", false);});
        $("input:radio").change(function(){$("#bayar-btn-janji<?=$d['id_dokter']?>").prop("disabled", false);});
        $(".button_bayar").prop("disabled", true);

        // $(document).ready(function(){
        //     $(".close").click(function(){
        //         location.reload(true);
        //     });
        // });

        $('#acc-bayar<?=$d['id_dokter']?>').on('hidden.bs.modal', function () {
          location.reload(true);
});
  $('#edit<?=$d['id_dokter']?>').on('hidden.bs.modal', function () {
    location.reload(true);
});
</script>
<script>

</script>
<?php } ?>
</div>
