      <?php
      if(@$_POST['tambah']){
        $invoice_code = $_POST['invoice_code'];
        $user_id = $_POST['user_id'];
        $customer_id = $_POST['customer_id'];
        $created_at = date("Y-m-d h:i:s");
        $sql = "insert into transactions set invoice_code='$invoice_code', user_id='$user_id', customer_id='$customer_id', total_amount=0, paid_amount=0, change_amount=0, created_at='$created_at'";
        if($koneksi->query($sql)){
          echo "Data Berhasil Ditambahkan !!";
          echo "<br>Halaman Akan dipindahkan ke Tampil Data Selama 3 Detik";
          header("Refresh: 3; url = transaksi.php");
        }else{
          echo "Data Gagal Ditambahkan !!";
        }
      }
      ?>
      <div class="col-lg-12 mt-3">
        <h4>Tambah Data</h4>
        <form method="POST">
          <div class="mb-3 mt-3">
            <label for="invoice_code">invoice_code:</label>
            <input type="text" class="form-control" placeholder="Enter invoice_code" name="invoice_code" required>

          <div class="mb-3">
            <label for="user_id">Petugas</label>
            <select name="user_id" class="form-control" required>
              <option value="">Pilih Petugas</option>
              <?php
              $sqlusers = "select * from users";
              $resultusers = $koneksi->query($sqlusers);
              while ($datausers = $resultusers->fetch_array()) {
                echo "<option value='$datausers[id]'>$datausers[username]</option>";
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
                echo "<option value='$datacustomers[id_pelanggan]'>$datacustomers[name]</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3 mt-3">
            <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
          </div>
        </form>
      </div>
    </div>