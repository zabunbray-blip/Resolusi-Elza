<?php
$id = $_GET['id'];
$sql = "select * from products where id_produk='$id'";
$data = $koneksi->query($sql)->fetch_array();
if(isset($_POST['edit'])) {
	    $name = $_POST['name'];
        $barcode = $_POST['barcode'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $created_at = $_POST['created_at'];
  	$sqledit = "update products set name='$name', barcode='$barcode', price='$price', stock='$stock', created_at='$created_at' where id_produk='$id'";
  	if ($koneksi->query($sqledit)) {
  		echo "Data Berhasil diubah";
  		echo "Halaman akan beralih ke halaman tampil selama 3 detik";
  		header("Refresh: 3; url=produk.php");
  	}
}
?>


<div class="col-lg-12 mt-3">
  <h2>Edit Data</h2>
  <form method="POST">
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" placeholder="Enter Name" value="<?php echo $data['name']; ?>" name="name" required>
    </div>

    <div class="mb-3">
      <label for="barcode">No.Phone:</label>
      <input type="text" class="form-control" placeholder="Enter barcode" value="<?php echo $data['barcode']; ?>" name="barcode" required>
    </div>

    <div class="mb-3">
      <label for="price">Harga:</label>
      <input type="text" class="form-control" placeholder="Enter email" value="<?php echo $data['price']; ?>" name="price" required>
    </div>

    <div class="mb-3">
      <label for="stock">Email:</label>
      <input type="text" class="form-control" placeholder="Enter email" value="<?php echo $data['stock']; ?>" name="stock" required>
    </div>

    <div class="mb-3">
      <label for="created_at">Waktu/tanggal</label>
      <input type="datetime-local" class="form-control" placeholder="Enter created" value="<?php echo $data['created_at']; ?>" name="created_at" required>
    </div>
    <input type="submit" class="btn btn-primary" name="edit" value="Edit">
  </form>
</div>