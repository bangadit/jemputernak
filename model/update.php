<?php
include "../conf/koneksi.php";
$sql = "SELECT * FROM jemput
        JOIN desa
        ON desa.id_desa = jemput.id_desa
        JOIN status
        ON status.id_status = jemput.id_status
        JOIN admin
        ON admin.id_admin = jemput.id_admin";

$hasil = $koneksi->query($sql);

if (isset($_POST['submit'])){
  $id_jemput = $_POST['id_jemput'];
  $id_admin = $_POST['id_admin'];
  $id_status = $_POST['id_status'];
}

$sql1 = "UPDATE jemput set id_jemput='$id_jemput',
id_admin='$id_admin',
id_status='$id_status'

WHERE id_jemput='$id_jemput'";

$q = $koneksi->query($sql1);

if($q === TRUE){
	echo '<script>window.location=("../data.php");
  </script>';
}
else {
  echo "Terjadi kesalahan ".$koneksi->error;
}

$koneksi->close();

?>
