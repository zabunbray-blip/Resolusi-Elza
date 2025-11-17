<?php
$id =  $_GET['id'];
$sql = "select * from categories where id_kategori='$id'";
$data = $koneksi->query($sql)->fetch_array();
if(isset($_POST['edit'])){
  $name = $_POST['name'];
  $created_at = date("Y-m-d h:i:s");
  $sqledit = "update categories set name='$name' where id_kategori='$id'";
  if($koneksi->query($sqledit)){
    echo "Data Berhasil DiUbah !!";
    echo "<br>Halaman Akan dipindahkan ke Tampil Data Selama 3 Detik";
    header("Refresh: 3; url = categories.php");
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
            <input type="text" class="form-control" placeholder="Enter Nama Kategori" name="name" value="<?php echo $data['name'];?>" required>
          </div>
          <div class="mb-3 mt-3">
            <input type="submit" name="edit" class="btn btn-primary" value="Edit">
          </div>
        </form>
      </div>