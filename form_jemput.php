<?php include 'header.php';
  if (isset($_POST['submit'])){
    $foto = $_FILES['foto']['name'];
    $sumber = $_FILES['foto']['tmp_name'];
    move_uploaded_file($sumber, 'assets/images/bukti/' . $foto);
    $perintah = mysqli_query($koneksi, "INSERT INTO jemput VALUES(NULL, '".$_POST['nik']."', '".$_POST['telepon']."', '".$_POST['nama']."', '".$_POST['sapi']."', '".$_POST['kambing']."',
    '".$_POST['unggas']."', '".$_POST['jumlah']."',  '".$foto."', '".$_POST['id_gunung']."', '".$_POST['id_desa']."', '".$_POST['alamat_detail']."', '".$_POST['lokasi_tujuan']."','".$_POST['harga']."',
    '".$_POST['id_admin']."', '".$_POST['id_status']."',now()) ");

    if ($perintah) {
      echo "<script>document.location='berhasil.php'</script>";
    }
    else{
      echo "<script>document.location='gagal.php'</script>";
    }
  }
?>
  <section id="appointment" data-stellar-background-ratio="3">
    <div class="container" style="margin-top:10px;">
      <div class="row">
        <div class="col-md-6 col-sm-6 visible-md visible-sm visible-lg wow fadeInUp" data-wow-delay="0.12s">
          <img src="assets/images/timsar.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-6 col-sm-6">
          <form class="appointment-form" action="form_jemput.php" role="form" method="post" enctype="multipart/form-data">
            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
              <h2>Form Penjemputan</h2>
            </div>
            <div class="wow fadeInUp" data-wow-delay="0.5s">
              <div class="col-md-12 col-sm-12" style="text-align:right;">
                <h5><b>Pemilik</b></h5>
                <hr>
              </div>
              <div class="col-md-6 col-sm-6">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" name="nik" maxlength="16" minlength="16" placeholder="NIK" required>
              </div>
              <div class="col-md-6 col-sm-6">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" name="telepon" placeholder="Telepon" required>
              </div>
              <div class="col-md-12 col-sm-12">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" required>
              </div>
              <div class="col-md-12 col-sm-12" style="margin-top:10px; text-align:right;">
                <h5><b>Jumlah Ternak</b></h5>
                <hr>
              </div>
              <div class="col-md-4 col-sm-4">
                <label for="sapi">Sapi/Kerbau</label>
                <input type="number" min="0" class="form-control" name="sapi" placeholder="Sapi/Kerbau">
              </div>
              <div class="col-md-4 col-sm-4">
                <label for="kambing">Kambing/Domba</label>
                <input type="number" min="0" class="form-control" name="kambing" placeholder="Kambing/Domba">
              </div>
              <div class="col-md-4 col-sm-4">
                <label for="unggas">Unggas</label>
                <input type="number" min="0" class="form-control" name="unggas" placeholder="Unggas">
              </div>
              <div hidden class="col-md-6 col-sm-6">
                <label for="jumlah">Jumlah</label>
                <input type="number" min="0" class="form-control" name="jumlah" placeholder="Jumlah" value="0">
              </div>
              <div class="col-md-12 col-sm-12">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control">
              </div>
              <div class="col-md-12 col-sm-12" style="margin-top:10px; text-align:right;">
                <h5><b>Lokasi</b></h5>
                <hr>
              </div>
              <div class="col-md-6 col-sm-6">
                <label for="id_gunung">Gunung</label>
                <select name="id_gunung"class="form-control">
                  <?php
                  include "conf/koneksi.php";
                  $sql = "SELECT * FROM gunung ORDER BY id_gunung DESC";
                  $hasil = $koneksi->query($sql);
                  if ($hasil->num_rows) {
                    while ($cetak = $hasil->fetch_assoc()) {
                      extract($cetak);?>
                      <option value=<?=$id_gunung;?>><?=$gunung;?></option>;
                      <?php
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6 col-sm-6">
                <label for="id_desa">Desa</label>
                <select name="id_desa" class="form-control">
                  <?php
                  include "conf/koneksi.php";
                  $sql = "SELECT * FROM desa ORDER BY id_gunung DESC";
                  $hasil = $koneksi->query($sql);
                  if ($hasil->num_rows) {
                    while ($cetak = $hasil->fetch_assoc()) {
                      extract($cetak);?>
                      <option value=<?=$id_desa;?>><?=$desa;?></option>;
                      <?php
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6 col-sm-6">
                <label for="alamat_detail">Lokasi Jemput</label>
                <textarea style="resize: none;" type="text" class="form-control" rows="5" maxlength="255" name="alamat_detail" placeholder="Alamat Jemput"></textarea>
              </div>
              <div class="col-md-6 col-sm-6">
                <label for="alamat_detail">Lokasi Tujuan</label>
                <textarea style="resize: none;" type="text" class="form-control" rows="5" maxlength="255" name="lokasi_tujuan" placeholder="Alamat Tujuan"></textarea>
              </div>
              <div hidden class="col-md-6 col-sm-6">
                <label for="harga">Harga</label>
                <input type="number" min="0" class="form-control" name="harga" placeholder="Harga" value="0">
              </div>
              <div class="col-md-6 col-sm-6 hidden">
                <label for="id_admin">Penjemput</label>
                <select name="id_admin" class="form-control">
                  <option value="1">1</option>
                </select>
              </div>
              <div class="col-md-6 col-sm-6 hidden">
                <label for="id_status">Status</label>
                <select name="id_status" class="form-control">
                  <option value="1">1</option>
                </select>
              </div>
              <div class="col-md-12 col-sm-12">
                <button type="submit" class="form-control" id="cf-submit" name="submit" onClick="return confirm('Apakah anda yakin?')">Kirim</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

<?php include 'footer.php'; ?>
