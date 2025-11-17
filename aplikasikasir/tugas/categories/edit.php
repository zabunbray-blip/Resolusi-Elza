<?php
$id = $_GET['id'];
$sql = "select * from categories where id_categories='$id'";
$data = $koneksi->query($sql)->fetch_array();
if(isset($_POST['edit'])) {
	$name = $_POST['name'];
  	$sqledit = "update categories set name='$name' where id_categories='$id'";
  	if ($koneksi->query($sqledit)) {
  		echo "Data Berhasil diubah";
  		echo "Halaman akan beralih ke halaman tampil selama 3 detik";
  		header("Refresh: 3; url=kategori.php");
  	}
}
?>


<div class="col-lg-12 mt-3">
  <h2>Edit Data</h2>
  <form method="POST">
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" placeholder="Enter name" value="<?php echo $data['name']; ?>" name="name" required>
    </div>

    <input type="submit" class="btn btn-primary" name="edit" value="Edit">
  </form>
</div>