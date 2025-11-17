<?php
if (isset($_POST['tambah'])) {
  $name = $_POST['name'];
  $sql = "insert into categories set name='$name'";
  if ($koneksi->query($sql)) {
    echo "Data Berhasil Ditambahkan";
    echo "Halaman Akan Dialihkan Ke Halaman Tampil Selama 3 Detik";
    header("Refresh: 3; url=kategori.php");
  }else{
    echo "Data Gagal Ditambahkan";
  }
}
?>

<div class="col-lg-12 mt-3">
  <h2>Tambah Data</h2>
  <form method="POST">
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" placeholder="Enter name" name="name" required>
    </div>

    <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
  </form>
</div>