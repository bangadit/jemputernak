<?php
  session_start();
  include 'conf/koneksi.php';
  if (isset($_POST['login'])){
    $username = $koneksi->real_escape_string($_POST['username']);
    $password = $koneksi->real_escape_string($_POST['password']);
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $hasil = $koneksi->query($sql);
    $q = $hasil->num_rows;
    if ($q) {
      $cetak = $hasil->fetch_assoc();
      extract($cetak);
      $_SESSION['sesi_login'] = $id_admin;
      $_SESSION['id_admin'] = $id_admin;
      echo '<script>window.location=("home_admin.php");</script>';
    }
    else{
      echo '<script>window.alert("Maaf, Password atau Username anda salah!");history.go(-1);</script>';
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Unisys UII">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JempuTernak - Sistem Penjemputan Ternak Korban Bencana Gunung Meletus</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/icon.png"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/tooplate-style.css">
  </head>
  <body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <section class="preloader">
      <div class="spinner">
        <span class="spinner-rotate"></span>
      </div>
    </section>

    <!-- <section>
      <header>
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-5">
              <p>JemputTernak</p>
            </div>
            <div class="col-md-8 col-sm-7 text-align-right">
              <span class="phone-icon"><i class="fa fa-phone"></i><a href="tel:+6281260176831"> +62 812 6017 6831</a></span>
              <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 8:00 AM - 17:00 PM (Mon-Fri)</span>
              <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="mailto:aditputr.irawan@gmail.com">mail@adtputr.com</a></span>
            </div>
          </div>
        </div>
      </header>
    </section> -->

    <section id="appointment" data-stellar-background-ratio="3">
      <form action="header.php" method="post">
        <div class="modal fade" role="dialog" id="login">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">
                  Login Penjemput
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </h3>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="login" class="section-btn btn btn-default smoothScroll">LOGIN</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section id="appointment" data-stellar-background-ratio="3">
      <form action="check.php" method="post">
        <div class="modal fade" role="dialog" id="check">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">
                  Check Proses Penjemputan
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </h3>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" maxlength="16" minlength="16" name="nik" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="section-btn btn btn-default smoothScroll">CHECK</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
          </button>
          <a href="index.php">
            <img src="assets/images/logo.png" width="250" alt="">
          </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php
              if (isset($_SESSION["sesi_login"])):
            ?>
              <li><a href="data.php" class="smoothScroll">Riwayat</a></li>
              <li><a href="home_admin.php" class="smoothScroll">Order</a></li>
              <li><a style="color:red;" href="model/logout.php">Logout</a></li>
            <?php else: ?>
              <li><a href="index.php" class="smoothScroll">Home</a></li>
              <li><a href="#contact" class="smoothScroll">Contact</a></li>
              <li><a href="" data-toggle="modal" data-target="#check">Check</a></li>
              <li class="appointment-btn"><a href="form_jemput.php">Form Penjemputan</a></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </section>
