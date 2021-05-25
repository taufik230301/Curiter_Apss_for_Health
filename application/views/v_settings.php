<!DOCTYPE html>
<html>
<head>
<style>
.boxsetting{
  width: 300px;
  height: 550px;
  padding: 50px;
  border: 1px solid red;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  width: 500px;
  margin: auto;
  border-radius: 25px;
}
.formsetting{
  margin-top: 100px;
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
}
.inputsetting:active, .inputsetting:hover{
  border-color: #ec4638;
}
.label{
  padding-top: 10px;
  margin-left: 20px;
}
.button_update{
  margin: 20px 0;
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
</style>
</head>
<body>

<form class='formsetting' action="<?= base_url('home/updatedata')?>" method="POST">
  <div class="boxsetting">
  <h4>Pengaturan</h4>
    <br>
    <label for="fullname" class="label">Nama Lengkap</label>
    <input type="text" class="inputsetting" id="fullname" name="fullname" value="<?= $userdisp['nama_user'] ?>">
    <label for="email" class="label">Email</label>
    <input type="text" class="inputsetting" id="email" name="email" value="<?= $userdisp['email_user'] ?>" disabled>
    <label for="password" class="label">New Password</label>
    <input type="password" class="inputsetting" id="password" name="newpassword" value="<?= $userdisp['password_user']?>">
    <!-- <label for="password" class="label">Re-Password</label>
    <input type="password" class="inputsetting" id="repassword" name="newrepassword">
     -->
    <br>
    <button type="submit" value="Simpan Profil" class="button_update">Simpan Profil</button>
  </form>
  </div>
  <center>
  <a href="<?= base_url('home/hapusakun')?>"><button type="submit" value="Delete Akun" class="button_update">Hapus Akun</button></a>
  </center>
  


</body>
</html>
