<?php include 'header.php';?>
  <section id="appointment" data-stellar-background-ratio="3">
    <div class="container" style="margin-top:10px;">
      <div class="row">
        <div class="col-md-6 col-sm-6 visible-md visible-sm visible-lg wow fadeInUp" data-wow-delay="0.12s">
          <img src="assets/images/timsar.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-6 col-sm-6">
          <form class="appointment-form" action="gagal.php" role="form" method="post" enctype="multipart/form-data">
            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
              <h2>Check</h2>
            </div>

            <?php
          $nik = $_POST['nik'];
          $sql = "SELECT * FROM jemput
                  JOIN gunung ON gunung.id_gunung = jemput.id_gunung
                  JOIN desa ON desa.id_desa = jemput.id_desa
                  JOIN status ON status.id_status = jemput.id_status
                  JOIN admin ON admin.id_admin = jemput.id_admin
                  WHERE nik = '$nik'";
          $hasil = $koneksi->query($sql);
          if ($hasil->num_rows) {
            while ($cetak = $hasil->fetch_assoc()) {
              extract($cetak);?>
              <?php $jumlah=$sapi+$kambing+$unggas;?>
							<?php $harga=($sapi*35000)+($kambing*15000)+($unggas*5000);?>
              <div class="wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-4">
                          <strong>
                            <label>Penjemput</label>
                          </strong>
                        </div>
                        <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                          :
                        </div>
                        <div class="col-md-7">
                          <p class="text-info"><?=$nama_admin;?></p>
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
                          <a class="text-success" href="tel:<?=$telepon_admin;?>"> <?=$telepon_admin;?></a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12" style="margin-top:10px;">
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
                          <p class="btn btn-success btn-sm" style="color:white;">
                            <strong>
                              <?=$status;?>
                            </strong>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12" style="margin-top:10px;">
                      <div class="row">
                        <div class="col-md-4">
                          <strong>
                            <label>Biaya</label>
                          </strong>
                        </div>
                        <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                          :
                        </div>
                        <div class="col-md-7">
                          <p>
  													<?php
  	                          $input = "UPDATE jemput set harga='$harga' WHERE id_jemput='$id_jemput'";
  	                          $qinput = $koneksi->query($input);
  	                        ?>
                            Rp. <?php echo number_format($harga); ?>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12" style="margin-top:10px;">
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
                      <hr>
                    </div>

                    <div class="col-md-12" style="margin-top:30px;">
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
                            <label>Jumlah Sapi</label>
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

                    <div class="col-md-12" style="margin-top:10px;">
                      <div class="row">
                        <div class="col-md-4">
                          <strong>
                            <label>Jumlah Kambing</label>
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

                    <div class="col-md-12" style="margin-top:10px;">
                      <div class="row">
                        <div class="col-md-4">
                          <strong>
                            <label>Jumlah Unggas</label>
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

                    <div class="col-md-12" style="margin-top:10px;">
                      <div class="row">
                        <div class="col-md-4">
                          <strong>
                            <label>Total Ternak</label>
                          </strong>
                        </div>
                        <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                          :
                        </div>
                        <div class="col-md-7">
                          <?php
                            $input = "UPDATE jemput set jumlah='$jumlah' WHERE id_jemput='$id_jemput'";
                            $qinput = $koneksi->query($input);
                          ?>
                          <p><?=$jumlah;?></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12" style="margin-top:10px;">
                      <div class="row">
                        <div class="col-md-4">
                          <strong>
                            <label>Foto</label>
                          </strong>
                        </div>
                        <div class="col-md-1 visible-md  visible-lg wow fadeInUp">
                          :
                        </div>
                        <div class="col-md-7">
                          <img src="assets/images/bukti/<?=$foto;?>" alt="<?=$foto;?>" width="100%">
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
                </div>
              </div>
              <?php
            }
          }else {?>
            <span class="contact100-form-title">
              <p class="text-danger" style="text-align:center;">Data tidak ditemukan!</p>
            </span>
            <?php
          }
        ?>
          </div>
        </form>
      </div>
    </div>
  </section>

<?php include 'footer.php'; ?>
