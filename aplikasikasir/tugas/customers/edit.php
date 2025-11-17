<?php
$id = $_GET['id'];
$sql = "select * from customers where id_pelanggan='$id'";
$data = $koneksi->query($sql)->fetch_array();
if(isset($_POST['edit'])) {
	$name = $_POST['name'];
  	$phone = $_POST['phone'];
  	$email = $_POST['email'];
  	$created_at = date("Y-m-d h:i:s");
  	$sqledit = "update customers set name='$name', phone='$phone', email='$email', created_at='$created_at' where id_pelanggan='$id'";
  	if ($koneksi->query($sqledit)) {
  		echo "Data Berhasil diubah";
  		echo "Halaman akan beralih ke halaman tampil selama 3 detik";
  		header("Refresh: 3; url=customers.php");
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
      <label for="phone">No.Phone:</label>
      <input type="text" class="form-control" placeholder="Enter phone" value="<?php echo $data['phone']; ?>" name="phone" required>
    </div>

    <div class="mb-3">
      <label for="email">Email:</label>
      <input type="text" class="form-control" placeholder="Enter email" value="<?php echo $data['email']; ?>" name="email" required>
    </div>

    <div class="mb-3">
      <label for="created_at">Waktu/tanggal</label>
      <input type="datetime-local" class="form-control" placeholder="Enter created" value="<?php echo $data['created_at']; ?>" name="created_at" required>
    </div>
    <input type="submit" class="btn btn-primary" name="edit" value="Edit">
  </form>
</div>