<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card-about {
  margin-top: 90px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-left: auto;
  margin-right: 20px;
}
.bodi{
  margin-top: 90px;
  margin-left: 20px;
}
.title-card {
  color: grey;
  font-size: 18px;
}

.imgabt{
  border-radius: 25px 25px 0 0;
}
.about{
  margin-bottom: 40px;
}
.flex-container{
  display: flex;
  margin: auto;
}
</style>
</head>
<body>
<div class="bodi">
<h2 class="about" style="text-align:left ">Tentang Curiter</h2>
<p>Curiter merupakan sebuah website dimana anda dapat menemukan seluruh informasi mengenai jadwal praktik dokter dan tempat registrasi online dari seluruh rumah sakit yang ada di Palembang. Selain itu, anda juga dapat melihat berbagai macam artikel kesehatan yang dapat membantu anda meningkatkan kesehatan diri anda secara mandiri.</p>
<br>
<h2 class="about" style="text-align:center">Para Pendekar Curiter</h2>
  <div class="flex-container">
    <div class="card card-about">
        <img src="<?php echo base_url(); ?>/Assets/doctor.png" class="imgabt" alt="alvin" style="width:100%">
        <h2>Taufiiqulhakim</h2>
        <p class="title-card">Teknik Komputer</p>
        <p>Politeknik Negeri Sriwijaya</p>
    </div>
      <div class="card card-about">
        <img src="<?php echo base_url(); ?>/Assets/doctor.png" class="imgabt" alt="alvin" style="width:100%">
        <h2>Rosa Alawiyah</h2>
        <p class="title-card">Manajemen Informatika</p>
        <p>Politeknik Negeri Sriwijaya</p>

      </div>
        <div class="card card-about">
          <img src="<?php echo base_url(); ?>/Assets/doctor.png" class="imgabt" alt="alvin" style="width:100%">
          <h2>Rida Dwirahma Defitria</h2>
          <p class="title-card">Manajemen Informatika</p>
          <p>Politeknik Negeri Sriwijaya</p>

        </div>
   
</div>
</div>
</body>
</html>
