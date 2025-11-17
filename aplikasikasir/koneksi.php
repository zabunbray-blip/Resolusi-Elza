<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "aplikasikasir_elza";
$koneksi = new mysqli($host,$user,$pass,$db);
if ($koneksi->connect_error) {
	die("koneksi gagal :".$koneksi->connect_error);
}else{
	echo "koneksi berhasil";
}
session_start();
?>