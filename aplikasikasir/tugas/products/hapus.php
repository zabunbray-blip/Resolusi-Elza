<?php
$id= $_GET['id'];
if (isset($_POST['hapus'])) {
	$sql = "delete from products where id_produk='$id'";
	if ($koneksi->query($sql)) {
		echo "Data Berhasil Dihapus!!";
		echo "<br>Halaman Akan Pindah ke Tampil Data Selama 3 Detik";
		header("Refresh: 3; url = produk.php");
	}else{
		echo "data gagal dihapus !!";
	}
}
?>
<div class="col-lg-12 mt-3">
	<h4>Hapus Data</h4>
	<form method="POST">
		<div class="mb-3 mt-3">
			<label for="description">apakah kamu yakin ingin menghapus data ID <?php echo $id;?></label>
		</div>
		<div class="mb-3 mt-3">
			<a href="produk.php" class="btn btn-primary">Tidak </a>
			<input type="submit" name="hapus" class="btn btn-primary" value="Ya">
		</div>
	</form>
</div>