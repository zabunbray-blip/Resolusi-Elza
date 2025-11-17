<?php
$id = $_GET['id'];
$sql = "select * from users where id='$id'";
$data = $koneksi->query($sql)->fetch_array();
if(isset($_POST['edit'])) {
	$username = $_POST['username'];
  	$password = $_POST['password'];
  	$role = $_POST['role'];
  	$created_at = date("Y-m-d h:i:s");
  	$sqledit = "update users set username='$username', password='$password', role='$role', created_at='$created_at' where id='$id'";
  	if ($koneksi->query($sqledit)) {
  		echo "Data Berhasil diubah";
  		echo "Halaman akan beralih ke halaman tampil selama 3 detik";
  		header("Refresh: 3; url=users.php");
  	}
}
?>


<div class="col-lg-12 mt-3">
  <h2>Edit Data</h2>
  <form method="POST">
    <div class="mb-3 mt-3">
      <label for="username">Username</label>
      <input type="text" class="form-control" placeholder="Enter username" value="<?php echo $data['username']; ?>" name="username" required>
    </div>

    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" placeholder="Enter password" value="<?php echo $data['password']; ?>" name="password" required>
    </div>

    <div class="mb-3">
      <label for="role">Role</label>
      <select name="role" class="form-control" required>
        <option value="<?php echo $data['role']; ?>"><?php echo $data['role']; ?></option>
        <option value="admin">admin</option>
        <option value="kasir">kasir</option>
      </select>
    </div>
    <input type="submit" class="btn btn-primary" name="edit" value="Edit">
  </form>
</div>