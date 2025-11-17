<?php
	if (@$_POST['tambahproduk']) {
		$transaction_id = $id;
		$datproduk = $_POST['product_id'];
		$pisahproduk = explode('_', $datproduk);
		$product_id = $pisahproduk[0];
		$price = $pisahproduk[1];
		$quantity = $_POST['quantity'];
		$subtotal = $quantity * $price;
		$sqlcek = "select * from products where id_produk = '$product_id'";
		$datcek = $koneksi->query($sqlcek)->fetch_array();
		if ($datcek['stock'] >= $quantity) {
			$sqldetail = "insert into transaction_details set transaction_id = '$transaction_id', product_id='$product_id', price='$price', quantity='$quantity', subtotal='$subtotal'";
			if ($koneksi->query($sqldetail)) {
				echo "Data Berhasil Ditambahkan";
				echo "<br>Halaman Akan Dipindahkan ke Tampil Data Selama 3 Detik";
				echo "
				<script>
				setTimeout(function(){
					window.location.href='transaksi.php?p=detail&id=$id';
				},3000);
				</script>
				";
			}else{
				echo "Data Gagal Ditambahkan";
			}
		}else{
			echo "Data Stock Tidak Ada";
		}
	}
?>
<div class="col-lg-12 mt-3">
	<h4>Tambah Data</h4>
	<form method="POST">
		<div class="mb-3">
			<label for="product_id">Product</label>
			<select name="product_id" class="form-control" required>
				<option value="">Pilih Produk</option>
				<?php
				$sqlproduct = "select * from products";
				$resultproduct = $koneksi->query($sqlproduct);
				while($dataproduct = $resultproduct->fetch_array()){
					$sqldetail = "select * from transaction_details where transaction_id='$id' and product_id = '$dataproduct[id_produk]'";
					$resultdetail = $koneksi->query($sqldetail);
					$contdetail = $resultdetail->num_rows;
					if ($contdetail<1){
						echo "<option value='$dataproduct[id_produk]_$dataproduct[price]'>$dataproduct[name]</option>";
					}
				}
				?>
			</select>
		</div>
		<div class="mb-3 mt-3">
			<label for="quantity">Quantity:</label>
			<input type="number" class="form-control" placeholder="Enter Invoice" name="quantity" required>
		</div>
		<div class="mb-3 mt-3">
			<input type="submit" name="tambahproduk" class="btn btn-primary" value="Tambah">
		</div>
	</form>
</div>