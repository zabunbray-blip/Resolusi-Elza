<?php 
$id=$_GET['id'];
if(isset($_POST['hapus'])){
  $sql = "delete from categories where id_kategori='$id'";
  if($koneksi->query($sql)){
    echo "Data Berhasil DiHapus !!";
    echo "<br>Halaman Akan dipindahkan ke Tampil Data Selama 3 Detik";
    header("Refresh: 3; url = categories.php");
  }else{
    echo "Data Gagal DiHapus !!";
  }
}
?>
      <div class="col-lg-12 mt-3">
        <h4>Hapus Data</h4>
        <form method="POST">
          <div class="mb-3 mt-3">
            <label for="description">Apakah Kamu Yakin Ingin Mengapus Data ID <?php echo $id;?></label>
          </div>
          <div class="mb-3 mt-3">
            <a href="customers.php" class="btn btn-primary">Tidak</a>
            <input type="submit" name="hapus" class="btn btn-primary" value="Ya">
          </div>
        </form>
      </div>