<?php
$paid_amount = $_POST['paid_amount'];
$total_amount = $_POST['total_amount'];
if ($paid_amount >= $total_amount) {
	$change_amount = $paid_amount - $total_amount;
	$sqlbayar = "update transactions set total_amount='$total_amount',
	paid_amount='$paid_amount', change_amount='$change_amount' where id_transaksi ='$id'";
	if ($koneksi->query($sqlbayar)) {
		echo "Pembayaran Berhasil Diproses";
		echo "<br>Halaman Akan Dipindahkan Ke Tampil Data Selama 3 Detik";
		@header("Refresh: 3; url = transaksi.php?p=detail&id=$id");
	}else{
		echo "Data Gagal Diproses";
	}
}else{
	echo "transaksi Gagal <br> Uang Anda Kurang !!";
}
?>