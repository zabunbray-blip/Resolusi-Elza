      <?php
      if(@$_POST['tambah']){
        $name = $_POST['name'];
        $sql = "insert into categories set name='$name'";
        if($koneksi->query($sql)){
          echo "Data Berhasil Ditambahkan !!";
          echo "<br>Halaman Akan dipindahkan ke Tampil Data Selama 3 Detik";
          header("Refresh: 3; url = categories.php");
        }else{
          echo "Data Gagal Ditambahkan !!";
        }
      }
      ?>
      <div class="col-lg-12 mt-3">
        <h4>Tambah Data</h4>
        <form method="POST">
          <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter Nama Kategori" name="name" required>
          </div>
          <div class="mb-3 mt-3">
            <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
          </div>
        </form>
      </div>