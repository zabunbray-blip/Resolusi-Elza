<?php
if (isset($_POST['tambah'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
  	$email = $_POST['email'];
  	$created_at = date("Y-m-d h:i:s");
  	$sql = "insert into customers set name='$name', phone='$phone', email='$email', created_at='$created_at'";
  if ($koneksi->query($sql)) {
    echo "Data Berhasil Ditambahkan";
    echo "Halaman Akan Dialihkan Ke Halaman Tampil Selama 3 Detik";
    header("Refresh: 3; url=customers.php");
  }else{
    echo "Data Gagal Ditambahkan";
  }
}
?>

<div class="col-lg-12 mt-3">
  <h2>Tambah Data</h2>
  <form method="POST">
    <div class="mb-3 mt-3">
      <label for="name">name</label>
      <input type="text" class="form-control" placeholder="Enter username" name="name" required>
    </div>

    <div class="mb-3">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" placeholder="Enter password" name="phone" required>
    </div>

    <div class="mb-3">
      <label for="email">Email:</label>
      <input type="text" class="form-control" placeholder="Enter password" name="email" required>
    </div>

    <div class="mb-3">
      <label for="created_at">Created_at:</label>
      <input type="datetime-local" class="form-control" placeholder="Enter password" name="created_at" required>
    </div>

    
    <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
  </form>
</div>