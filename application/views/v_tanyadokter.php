<div class="container" style="margin-top: 90px">
      <h4 style="margin-left: 20px;">Cari Dokter Anda</h4>

      <div class="konten-dokter" style="overflow:auto; height:auto;">
          <?php for ($i=0; $i < 90 ; $i++) { ?>
            <div class="card mb-3" style="width:inherit;height: auto; margin-right: 80px;margin-left:20px;">
  <div class="row no-gutters" >
  <div class="col-md-2" >
      <img src="<?php echo base_url(); ?>/Assets/doctor.png" class="card-img" alt="..." >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title" style="text-align:left;">Nama Dokter | Jenis Spesialis</h5>
        <!-- <h6 class="card-title">Jenis Spesialis</h6> -->
        <p class="card-text" style="text-align:left;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <!-- <a href="#" class="btn btn btn-primary btn-sm active" role="button" aria-pressed="true">Primary link</a> -->
      </div>
  </div>
  <div class="col-md-2"style="margin-top: 120px;" >
    <button class="ml-auto btn btn-primary text-uppercase" type="button" name="button" style="border-radius:13px;font-size:13px;background-color:#ec4638;border-color:#ec4638;">CHAT</button>
    <button class="ml-auto btn btn-primary text-uppercase" type="button" name="button" style="border-radius:13px;font-size:13px;background-color:#ec4638;border-color:#ec4638;">BUAT JANJI</button>

  </div>
  </div>
</div>
<?php } ?>
      </div>
</div>
