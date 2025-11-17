<?php
$id =  $_GET['id'];
$sql = "select * from customers where id_pelanggan='$id'";
$data = $koneksi->query($sql)->fetch_array();
if(isset($_POST['edit'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $created_at = date("Y-m-d h:i:s");
  $sqledit = "update customers set name='$name', phone='$phone', email='$email', created_at = '$created_at' where id_pelanggan='$id'";
  if($koneksi->query($sqledit)){
    echo "Data Berhasil DiUbah !!";
    echo "<br>Halaman Akan dipindahkan ke Tampil Data Selama 3 Detik";
    header("Refresh: 3; url = customers.php");
  }else{
    echo "Data Gagal DiUbah !!";
  }
}
?>
      <div class="col-lg-12 mt-3">
        <h4>Edit Data</h4>
        <form method="POST">
          <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo $data['name'];?>" required>
          </div>
          <div class="mb-3">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" minlength="10" maxlength="20" placeholder="Enter Phone" name="phone" value="<?php echo $data['phone'];?>" required>
          </div>
          <div class="mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $data['email'];?>" required>
          </div>
          <div class="mb-3 mt-3">
            <input type="submit" name="edit" class="btn btn-primary" value="Edit">
          </div>
        </form>
      </div>