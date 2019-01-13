<?php
$namaServer = "localhost";
$namaPengguna = "root";
$password = "";
$nama_db = "jemputernak";

$koneksi = new mysqli($namaServer, $namaPengguna, $password, $nama_db);

if ($koneksi->connect_error){
	die("Koneksi Gagal : ".$koneksi->connect_error."<br>");
}
?>
