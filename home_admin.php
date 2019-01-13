<?php include 'header.php';
if (!isset($_SESSION['id_admin'])) {
  echo '<script>window.alert("Maaf, anda wajib login dahulu");window.location=("index.php");</script>';
}
?>
  <section>
    <div class="container" style="margin-top:10px;">
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
      <h5>Order</h5>
      <form action="model/update.php" method="post">
      <?php
      $sql="SELECT * FROM jemput
      JOIN gunung ON gunung.id_gunung = jemput.id_gunung
      JOIN desa ON desa.id_desa = jemput.id_desa
      JOIN status ON status.id_status = jemput.id_status
      JOIN admin ON admin.id_admin = jemput.id_admin
      WHERE status.id_status = 1 ORDER BY time ASC";
      $hasil=$koneksi->query($sql);
      ?>
      <div class="table-responsive">
        <table class="table table-bordered text-center col-md-12">
          <tr class="active">
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Desa</th>
            <th class="text-center">Order</th>
            <th class="text-center">Aksi</th>
          </tr>
          <?php
          $no=1;

          if ($hasil->num_rows>0) {
            while($baris=$hasil->fetch_assoc()){
              $id_jemput=$baris['id_jemput'];
              $nama=$baris['nama'];
              $gunung=$baris['gunung'];
              $desa=$baris['desa'];
              $time=$baris['time'];
              ?>
              <tr>
                <td>
                  <a class="btn btn-link" style="color:black;">
                    <?=$no;?>
                  </a>
                </td>
                <td>
                  <a class='btn btn-link'>
                    <strong>
                      <?=$nama;?>
                    </strong>
                  </a>
                </td>
                <td>
                  <a class="text-success">
                    <?=$desa;?>
                  </a>
                  <br>
                  <?=$gunung;?>
                </td>
                <td><?=$time;?></td>
                <td>
                  <a href='detail.php?id_jemput=<?=$id_jemput;?>'>
                    <button type="button" class="btn btn-primary" name="button">
                      <i class="fa fa-search"></i>
                    </button>
                  </a>
                </td>
              </tr>
              <?php
              $no++;
            }
          }
          ?>
        </table>
      </div>
    </form>
    </div>
  </section>
<?php include 'footer.php'; ?>
