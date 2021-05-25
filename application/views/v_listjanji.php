
<style media="screen">
.inputsetting {
  width: 60%;
  padding: 6px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid grey;
  margin-left: 20px;
  margin-top: 1px;
  outline: none;
}
.inputsetting:active, .inputsetting:hover{
  border-color: #ec4638;
}
.label{
  padding-top: 5px;
  margin-top: 10px;
  /* margin-left: 20px; */
}
.boxsetting{
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
</style>
<div class="container">
  <table class="table table-striped"   style="margin-top: 2%;">
    <h2 style="margin-top:10%;"> List Janji Dengan Dokter</h2>
    <thead>
      <tr>
        <th>No. </th>
        <th> Nama Dokter </th>
        <th> Tanggal </th>
        <th> Jam </th>
        <th> Tempat</th>
        <th width = "10%"> Ubah</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1;foreach ($janji as $j) { ?>
        <tr>
          <td> <?=$i++?> </td>
          <td id="nama"> <?= $j['nama_dokter']?> </td>
          <td id="tgl"> <?= $j['tgl_janji']?> </td>
          <td id="jam"> <?= $j['waktu_janji']?> </td>
          <td id="tempat"> <?php $rs = $this->db->get_where('rumahsakit',array("id_rs"=>$j['id_rs']))->row_array();
          echo "Rumah Sakit ".$rs['nama_rs'];?> </td>
          <td><button  data-toggle="modal" data-target="#ubah<?=$j['id_janji']?>" class="button-edit" onclick="editdata(<?=$j['id_janji']?>)"> Ubah Janji </button> </td>
        </tr>
        <?php  } ?>
    </tbody>
  </table>
</div>

<?php foreach($janji as $jn):?>
<!-- MODAL UNTUK FORM PERUBAHAN -->
<div id="ubah<?=$jn['id_janji']?>" class="modal fade">
      <div class="modal-dialog">
                <div class="modal-content">
                     <div class="modal-header">
                       <h4 class="modal-title">Ubah Janji dengan Dokter <?=$jn['nama_dokter']?></h4>

                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                       <form method="post" id="ubah-janji" action="<?= base_url('janji/update/'.$jn['id_janji'])?>">
                         <label>Ubah Tanggal</label>
                         <input type="date" class="inputsetting" id="ubah-tgl" name="ubah-tgl">
                         <br />
                          <label>Ubah Jam</label>
                          <input type="time" class="inputsetting" id="ubah-jam" name="ubah-jam">
                          <br />



                     </div>
                     <div class="modal-footer">
                       <button data-toggle="modal" data-target="#reminder-delete<?=$jn['id_janji']?>" type="button"  class="btn btn-danger" data-dismiss="modal" style="margin-right:40%;">Batalkan Janji</button>
                          <input type="hidden" name="ubah-data" id="ubah-data" />
                          <input type="submit" name="ubah" id="ubah" class="btn btn-success" value="Ubah" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                </div>
           </form>
      </div>
 </div>

<!--  MODAL UNTUK REMINDER DELETE -->
<div class="modal fade" id="reminder-delete<?=$jn['id_janji']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">PERINGATAN !</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="align-items: center;padding:0;border-radius: 25px;">
        <div class="boxsetting">
          <h5>"BATALKAN JANJI DENGAN <?=$jn['nama_dokter']?> ?"</h5>
        </div>
      </form>
      </div>
      <div class="modal-footer">
           <input type="hidden" name="batal-janji" id="batal-janji" />
           <!-- <input style="margin-right:20px;" type="submit" name="batalkan" id="batalkan" class="btn btn-danger" value="YA" /> -->
           <button style="margin-right:20px;" type="submit" name="batalkan" id="batalkan" class="btn btn-danger" value="YA"><a href="<?= base_url('janji/hapus/'.$jn['id_janji'])?>">YA</a></button>
           <button type="button" class="btn btn-success" data-dismiss="modal">TIDAK</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>



<!-- <script>
  function editdata(x){
    $.ajax({
      type: "POST",
      data: 'id='+x,
      url : ,
      dataType : 'json',
      success: function(hasil){
        console.log(hasil);
      }

    });
  }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js">

</script> -->
