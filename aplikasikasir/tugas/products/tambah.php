<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Siswa</title>
</head>
<body>
	<?php
	if (isset($_POST['tambah'])) {
		$name = $_POST['name'];
		$barcode = $_POST['barcode'];
		$price = $_POST['price'];
        $stock = $_POST['stock'];
		$created_at = $_POST['created_at'];
		include "koneksi.php";
		$sql = "insert into products set name='$name', barcode='$barcode', price='$price', stock='$stock', created_at='$created_at'";
	if ($koneksi->query($sql)) {
		echo "Data  Pelanggan Berhasil Dimasukan<br>";
		echo "Halaman Akan Dialihkan Ke Halaman Tampil Data Selama 3 Detik";
		header("Refresh: 3; url=produk.php");
	}else{
		echo "Data pelanggan Gagal Dimasukan";
	}
	}
	?>
  <div class="col-lg-12 mt-3">
	<form method="POST">
		<h4>Tambah Produk</h4>
    <div class="mb-3 mt-3">
      <label for="name">Name Produk</label>
      <input type="text" class="form-control" placeholder="masukan nama produk" name="name" required>
    </div>

    <div class="mb-3 mt-3">
      <label for="barcode">barcode</label>
      <input type="text" class="form-control" placeholder="Enter barcode" name="barcode" required>
    </div>

     <div class="mb-3 mt-3">
      <label for="price">price</label>
      <input type="text" class="form-control" placeholder="Enter price" name="price" required>
    </div>

    <div class="mb-3 mt-3">
      <label for="stock">Stock</label>
      <input type="text" class="form-control" placeholder="Enter stock" name="stock" required>
    </div>

    <div class="mb-3 mt-3">
      <label for="created_at">Created_at</label>
      <input type="datetime-local" class="form-control" placeholder="Enter Date" name="created_at" required>
    </div>

		<input type="submit" name="tambah" value="tambah">
	</form>
</div>

</body>
</html>