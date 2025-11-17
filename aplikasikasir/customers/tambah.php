      <?php
      if(@$_POST['tambah']){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $created_at = date("Y-m-d h:i:s");
        $sql = "insert into customers set name='$name', phone='$phone', email='$email', created_at='$created_at'";
        if($koneksi->query($sql)){
          echo "Data Berhasil Ditambahkan !!";
          echo "<br>Halaman Akan dipindahkan ke Tampil Data Selama 3 Detik";
          header("Refresh: 3; url = customers.php");
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
            <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" minlength="10" maxlength="20" placeholder="Enter Phone" name="phone" required>
          </div>
          <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
          </div>
          <div class="mb-3 mt-3">
            <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
          </div>
        </form>
      </div>