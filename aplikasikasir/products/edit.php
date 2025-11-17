<?php
$id =  $_GET['id'];
$sql = "select * from products where id_produk='$id'";
$data = $koneksi->query($sql)->fetch_array();
if(isset($_POST['edit'])){
  $name = $_POST['name'];
  $barcode = $_POST['barcode'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $category_id = $_POST['category_id'];
  $created_at = date("Y-m-d h:i:s");
  $sqledit = "update products set name='$name', barcode='$barcode', price='$price', stock='$stock', category_id='$category_id', created_at='$created_at' where id_produk='$id'";
  if($koneksi->query($sqledit)){
    echo "Data Berhasil DiUbah !!";
    echo "<br>Halaman Akan dipindahkan ke Tampil Data Selama 3 Detik";
    header("Refresh: 3; url = products.php");
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
            <input type="text" class="form-control" value="<?php echo $data['name']?>" placeholder="Enter Name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="barcode">Barcode:</label>
            <input type="text" class="form-control" value="<?php echo $data['barcode']?>" placeholder="Enter Barcode" name="barcode" required>
          </div>
          <div class="mb-3">
            <label for="price">Price Rp.</label>
            <input type="number" class="form-control" value="<?php echo $data['price']?>" placeholder="Enter Price" name="price" required>
          </div>
          <div class="mb-3">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" value="<?php echo $data['stock']?>" placeholder="Enter Stock" name="stock" required>
          </div>

          <div class="mb-3">
            <label for="categories">Categories</label>
            <select name="category_id" class="form-control" required>
              <?php
              $sqlcategories = "select * from categories";
              $resultcategories = $koneksi->query($sqlcategories);
              while ($datacategories = $resultcategories->fetch_array()) {
                echo "<option value='$datacategories[id_kategori]'";
                if ($datacategories['id_kategori']==$data['category_id']) {
                  echo "selected";
                }
                echo ">$datacategories[name]</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3 mt-3">
            <input type="submit" name="edit" class="btn btn-primary" value="Edit">
          </div>
        </form>
      </div>