      <?php
      if(@$_POST['tambah']){
        $name = $_POST['name'];
        $barcode = $_POST['barcode'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $category_id = $_POST['category_id'];
        $created_at = date("Y-m-d h:i:s");
        $sql = "insert into products set name='$name', barcode='$barcode', price='$price', stock='$stock', category_id='$category_id', created_at='$created_at'";
        if($koneksi->query($sql)){
          echo "Data Berhasil Ditambahkan !!";
          echo "<br>Halaman Akan dipindahkan ke Tampil Data Selama 3 Detik";
          header("Refresh: 3; url = products.php");
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
            <label for="barcode">Barcode:</label>
            <input type="text" class="form-control" placeholder="Enter Barcode" name="barcode" required>
          </div>
          <div class="mb-3">
            <label for="price">Price Rp.</label>
            <input type="number" class="form-control" placeholder="Enter Price" name="price" required>
          </div>
          <div class="mb-3">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" placeholder="Enter Stock" name="stock" required>
          </div>

          <div class="mb-3">
            <label for="categories">Categories</label>
            <select name="category_id" class="form-control" required>
              <option value="">Pilih Categories</option>
              <?php
              $sqlcategories = "select * from categories";
              $resultcategories = $koneksi->query($sqlcategories);
              while ($datacategories = $resultcategories->fetch_array()) {
                echo "<option value='$datacategories[id_kategori]'>$datacategories[name]</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3 mt-3">
            <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
          </div>
        </form>
      </div>