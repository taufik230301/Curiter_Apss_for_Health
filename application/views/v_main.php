<style>
  .buton:hover {
    background-color: btn-outline;
  }

  a.artikel {
    text-decoration: none;
    color: black;
    float: right;
  }

  a.artikel:hover {
    color: #ec4638;
  }

  .card {
    border: 2px solid rgba(0, 0, 0, .125);
  }
</style>
<div class="container" style="margin-top: 90px">
  <center>
    <table style="width:100%;">
      <tr>
        <td> <a href="<?= base_url('home/index/corona') ?>" style="font-size: 150%;text-decoration:none;"><button class="btn btn-outline-info buton" style="border-radius:25px;width:9em;">Corona</button></a> </td>
        <td> <a href="<?= base_url('home/index/vitamin') ?>" style="font-size: 150%;text-decoration:none;"><button class="btn btn-outline-info buton" style="border-radius:25px;width:9em;">Vitamin</button></a> </td>
        <td> <a href="<?= base_url('home/index/obat') ?>" style="font-size: 150%;text-decoration:none;"><button class="btn btn-outline-info buton" style="border-radius:25px;width:9em;">Obat</button></a> </td>
        <td> <a href="<?= base_url('home/index/virus') ?>" style="font-size: 150%;text-decoration:none;"><button class="btn btn-outline-info buton" style="border-radius:25px;width:9em;">Virus</button></a> </td>
        <td> <a href="<?= base_url('home/index/kesehatan') ?>" style="font-size: 150%;text-decoration:none;"><button class="btn btn-outline-info buton" style="border-radius:25px;width:9em;">Kesehatan</button></a> </td>
        <td> <a href="<?= base_url('home/index/jantung') ?>" style="font-size: 150%;text-decoration:none;"><button class="btn btn-outline-info buton" style="border-radius:25px;width:9em;">Jantung</button></a> </td>
      </tr>
    </table>

</div>

<div class="container" style="margin-top: 20px;padding:10px;">
  <center>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="z-index:5">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="width: 70%; order: 0;">
        <div class="carousel-item active">
          <img class="d-block w-100" src="<?php echo base_url(); ?>Assets/depan.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo base_url(); ?>Assets/medicine1.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo base_url(); ?>Assets/medicine2.png" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div>

<div class="container" style="margin-top: 10px;margin-bottom:150px;">
  <section class="cards">

    <div class="card" style="width: 18rem;">
      <a href="<?= base_url('caridokter/') ?>"></a>
      <center>
        <img class="card-img-top" src="<?php echo base_url(); ?>/Assets/dokter.png" alt="Card image cap">
      </center>
      <div class="card-body">
        <p> <strong>CARI DOKTER</strong> </p>
        <p class="card-text">Temukan Dokter yang Tepat.</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <a href="<?= base_url('rumahsakit/') ?>"></a>
      <center>
        <img class="card-img-top" src="<?php echo base_url(); ?>/Assets/rs.jpeg" alt="Card image cap">
      </center>
      <div class="card-body">
        <p> <strong>RUMAH SAKIT</strong></p>
        <p class="card-text">Kunjungan Ke Rumah Sakit Jadi Lebih Mudah.</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <a href="<?= base_url('about/') ?>"></a>
      <center>
        <img class="card-img-top" src="<?php echo base_url(); ?>/Assets/drug.png" alt="Card image cap">
      </center>
      <div class="card-body">
        <p> <strong>Tentang Curiter</strong></p>
        <p class="card-text">Kenali kami lebih dekat.</p>
      </div>
    </div>
  </section>
</div>

<div class="main">
  <div class="container konten">
    <h1>Artikel Kesehatan</h1>
    <?php if ($artikel) {
      foreach ($artikel as $ar) { ?>
        <hr>
        <div class="text-container">
          <h3 class="artikel"><?= $ar['judul_artikel'] ?></h3>
          <?php
          $split = explode('.', $ar['konten_artikel'])
          ?>
          <p class="artikel"><?= $split[0] . "." . $split[1] . "..." ?></p>
          <a href="<?= base_url('home/artikel/' . $ar['id_artikel']) ?>" class="artikel" target="_blank">Read More</a>
        </div>
        <br>
        <hr>
      <?php } ?>
    <?php } else { ?>
      <hr>
      <div class="text-container">
        <h3 class="artikel">Artikel Belum Tersedia</h3>
      </div>
      <br>
      <hr>
    <?php } ?>
  </div>
</div>