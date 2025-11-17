<?php
$id=$_GET['id'];
$id_detail = $_GET['id_detail'];
$sql = "delete from transaction_details where transaction_id='$id' and id_detail = '$id_detail'";
if ($koneksi->query($sql)) {
	echo "Data Berhasil Dihapus !!";
	echo "<br> Halaman Akan Dipindahkan Ke Tampil Data Selama 3 Detik";
	@header("Refresh: 3; url = transaksi.php?p=detail&id=$id");
}else{
	echo "Data Gagal Dihapus";
}
?>