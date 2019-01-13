<?php include 'header.php';
if (!isset($_SESSION['id_admin'])) {
  echo '<script>window.alert("Maaf, anda wajib login dahulu");history.go(-1);</script>';
}
?>
  <section id="appointment" data-stellar-background-ratio="3">
    <div class="container">
      <?php
        if ($_SESSION['sesi_login']) {
          $id_admin = $_SESSION['sesi_login'];
        }
        $sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id_admin'") or die(mysql_error());
        $data = mysqli_fetch_array($sql);
      ?>
      <div style="text-align:right;">
        <h6>
          <strong>
            Welcome, <?=$data['nama_admin'];?>
          </strong>
        </h6>
        <hr>
      </div>
      <form action="model/update.php" method="post">
        <?php
        $id_jemput=$_GET['id_jemput'];
        $sql="SELECT * FROM jemput
        JOIN gunung ON gunung.id_gunung = jemput.id_gunung
        JOIN desa ON desa.id_desa = jemput.id_desa
        JOIN status ON status.id_status = jemput.id_status
        JOIN admin ON admin.id_admin = jemput.id_admin
        WHERE id_jemput='$id_jemput'";
        $hasil=$koneksi->query($sql);
        if ($hasil->num_rows) {
          while ($baris=$hasil->fetch_array()) {
            $id_jemput=$baris['id_jemput'];
            $nik=$baris['nik'];
            $nama=$baris['nama'];
            $telepon=$baris['telepon'];
            $sapi=$baris['sapi'];
            $kambing=$baris['kambing'];
            $unggas=$baris['unggas'];
            $jumlah = $baris['jumlah'];
            $foto=$baris['foto'];
            $gunung=$baris['gunung'];
            $desa=$baris['desa'];
            $alamat_detail = $baris['alamat_detail'];
            $lokasi_tujuan = $baris['lokasi_tujuan'];
            $harga=$baris['harga'];
            $nama_admin = $baris['nama_admin'];
            $status = $baris['status'];
            $time = $baris['time'];
            ?>

            <div class="col-md-12">
              <h4><?=$nama;?></h4>
              <div class="row">
                <div class="col-md-1 col-sm-1">
                  <strong>
                    <label>Telepon</label>
                  </strong>
                </div>
                <div class="col-md-7 col-sm-1">
                  <a class="text-info" href='tel:<?=$telepon;?>'><?=$telepon;?></a>
                </div>
              </div>
              <div class="row" style="margin-top:10px;">
                <div class="col-md-1 col-sm-1">
                  <strong>
                    <label>Biaya</label>
                  </strong>
                </div>
                <div class="col-md-7 col-sm-1">
                  <p class="btn btn-success btn-sm" style="color:white;">
                    <strong>
                      <?php
                        $harga=($sapi*35000)+($kambing*15000)+($unggas*5000);
                        $input = "UPDATE jemput set harga='$harga' WHERE id_jemput='$id_jemput'";
                        $qinput = $koneksi->query($input);
                      ?>
                        Rp. <?php echo number_format($harga); ?>
                    </strong>
                  </p>
                </div>
              </div>
              <hr>
            </div>

            <div class="col-md-12 wow fadeInUp">
              <div class="row">

                <div class="col-md-3 hidden">
                  <label>NIK</label>
                  <input class="form-control" type="text" name="id_jemput" value="<?=$id_jemput;?>" readonly>
                </div>

                <div class="col-md-12 hidden">
                  <div class="row">
                    <div class="col-md-4">
                      <strong>
                        <label>Penjemput</label>
                      </strong>
                    </div>
                    <div class="col-md-1 visible-md visible-lg wow fadeInUp">
                      :
                    </div>
                    <div class="col-md-7">
                      <?php
                        if ($_SESSION['sesi_login']) {
                          $id_admin = $_SESSION['sesi_login'];
                        }
                        $sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id_admin'") or die(mysql_error());
                        $data = mysqli_fetch_array($sql);
                      ?>
                      <input class="form-control" type="text" name="id_admin" value="<?=$data['id_admin'];?>" readonly>
                    </div>
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>
                          <label>Status</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <select class="form-control" type='text' name='id_status'>
                          <?php
                          $sql = "SELECT * FROM status";
                          $hasil = $koneksi->query($sql);
                          if ($hasil->num_rows) {
                            while ($cetak = $hasil->fetch_assoc()) {
                              extract($cetak);
                              if ($baris['id_status'] == "$id_status") echo "<option value='$id_status' selected>$status</option>";
                              else echo "<option value='$id_status'>$status</option>";
                            }
                          }
                          ?>
                        </select>
                        <p>
                          <input class="btn btn-link" type="submit" name="submit" value="UPDATE" onClick="return confirm('Apakah anda yakin?')">
                          <a class="btn btn-link" href='javascript:history.back()'>CANCEL</a>
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>
                          <label>Perbarui</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$time;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>
                          <label>Nama</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$nama;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12" style="margin-top:10px;">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>
                          <label>NIK</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$nik;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12" style="margin-top:10px;">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>
                          <label>Telepon</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$telepon;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12" style="margin-top:10px;">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>
                          <label>Gunung</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$gunung;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12" style="margin-top:10px;">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>
                          <label>Desa</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$desa;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12" style="margin-top:10px;">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>
                          <label>Lokasi Jemput</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$alamat_detail;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12" style="margin-top:10px;">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>
                          <label>Lokasi Tujuan</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$lokasi_tujuan;?></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-7">

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-3">
                        <strong>
                          <label>Sapi</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$sapi;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-3">
                        <strong>
                          <label>Kambing</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$kambing;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-3">
                        <strong>
                          <label>Unggas</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <p><?=$unggas;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-3">
                        <strong>
                          <label>Jumlah</label>
                        </strong>
                      </div>
                      <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                        :
                      </div>
                      <div class="col-md-7">
                        <?php
                          $jumlah=$unggas+$kambing+$sapi;
                          $input = "UPDATE jemput set jumlah='$jumlah' WHERE id_jemput='$id_jemput'";
                          $qinput = $koneksi->query($input);
                        ?>
                        <p><?=$jumlah;?></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <hr class="visible-md  visible-lg wow fadeInUp">
                      <div class="col-md-12">
                        <strong>
                          <label>Foto</label>
                        </strong>
                      </div>
                      <div class="col-md-12">
                        <a href="assets/images/bukti/<?=$foto;?>">
                          <img src="assets/images/bukti/<?=$foto;?>" alt="<?=$foto;?>" width="100%">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <?php
          }
        }
        ?>
      </form>
    </div>

  </section>
<?php include 'footer.php'; ?>
