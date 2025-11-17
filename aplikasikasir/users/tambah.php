<?php
if (isset($_POST['tambah'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $created_at = date("Y-m-d h:i:s");
  $sql = "insert into users set username='$username', password='$password', role='$role', created_at='$created_at'";
  if ($koneksi->query($sql)) {
    echo "Data Berhasil Ditambahkan";
    echo "Halaman Akan Dialihkan Ke Halaman Tampil Selama 3 Detik";
    header("Refresh: 3; url=users.php");
  }else{
    echo "Data Gagal Ditambahkan";
  }
}
?>

<div class="col-lg-12 mt-3">
  <h2>Tambah Data</h2>
  <form method="POST">
    <div class="mb-3 mt-3">
      <label for="username">Username</label>
      <input type="text" class="form-control" placeholder="Enter username" name="username" required>
    </div>

    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" placeholder="Enter password" name="password" required>
    </div>

    <div class="mb-3">
      <label for="role">Role</label>
      <select name="role" class="form-control" required>
        <option value="">pilih role anda</option>
        <option value="admin">admin</option>
        <option value="kasir">kasir</option>
      </select>
    </div>
    <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
  </form>
</div>