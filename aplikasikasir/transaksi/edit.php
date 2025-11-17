<?php
$id =  $_GET['id'];
$sql = "select * from transactions where id_transaksi='$id'";
$data = $koneksi->query($sql)->fetch_array();
if(isset($_POST['edit'])){
 $invoice_code = $_POST['invoice_code'];
  $user_id = $_POST['user_id'];
  $customer_id = $_POST['customer_id'];
  $created_at = date("Y-m-d h:i:s");
  $sqledit = "update transactions set invoice_code='$invoice_code', user_id='$user_id', customer_id='$customer_id', created_at='$created_at' where id_transaksi='$id'";
  if($koneksi->query($sqledit)){
    echo "Data Berhasil DiUbah !!";
    echo "<br>Halaman Akan dipindahkan ke Tampil Data Selama 3 Detik";
    header("Refresh: 3; url = transaksi.php?p=detail&id=$id");
  }else{
    echo "Data Gagal DiUbah !!";
  }
}
?>
<div class="col-lg-12 mt-3">
        <h4>Edit Data</h4>
        <form method="POST">
          <div class="mb-3 mt-3">
            <label for="invoice_code">invoice_code:</label>
            <input type="text" class="form-control" placeholder="Enter invoice_code" name="invoice_code" value="<?php echo $data['invoice_code']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="user_id">Petugas</label>
            <select name="user_id" class="form-control" required>
              <option value="">Pilih Petugas</option>
              <?php
              $sqlusers = "select * from users";
              $resultusers = $koneksi->query($sqlusers);
              while ($datausers = $resultusers->fetch_array()) {
                echo "<option value='$datausers[id]'";
                if ($datausers['id'] == $data['user_id']) {
                  echo "selected";
                }
                echo">$datausers[username]</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="customer_id">Pelanggan</label>
            <select name="customer_id" class="form-control" required>
              <option value="">Pilih Pelanggan</option>
              <?php
              $sqlcustomers = "select * from customers";
              $resultcustomers = $koneksi->query($sqlcustomers);
              while ($datacustomers = $resultcustomers->fetch_array()) {
                echo "<option value='$datacustomers[id_pelanggan]'";
                if ($datacustomers['id_pelanggan'] == $data['customer_id']) {
                  echo "selected";
                }
                echo">$datacustomers[name]</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3 mt-3">
            <input type="submit" name="edit" class="btn btn-primary" value="Edit">
          </div>
        </form>
      </div>