<div class="col-lg-12 mt-3">
  <h2>Barang Dipilih</h2>

  <p>
    <a href="transaksi.php?p=detail&id=<?php echo $id; ?>&a=tambah" 
       class="btn btn-primary col-lg-12">Tambah</a>
  </p>

  <p>
    <?php 
    $a = @$_GET['a'];
    if ($a == "tambah") {
      include "details/tambah.php";
    } elseif ($a == "hapus") {
      include "details/hapus.php";
    }
    if (@$_POST['proses_bayar']) {
      include "details/prosesbayar.php";
    }
    ?>
  </p>

  <table class="table table-striped">
    <thead>
      <tr>
        <th class="col-lg-1">No</th>
        <th class="col-lg-1">Nama Produk</th>
        <th class="col-lg-1">Stock</th>
        <th class="col-lg-1">Price</th>
        <th class="col-lg-1">Quantity</th>
        <th class="col-lg-1">Subtotal</th>
        <th class="col-lg-1">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sqldetails = "select * from transaction_details join products ON products.id_produk = transaction_details.product_id where transaction_details.transaction_id='$id'";
      $resultdetails = $koneksi->query($sqldetails);
      $no=1;
      $total =0;

      if ($resultdetails->num_rows > 0) {
        while ($datadetails = $resultdetails->fetch_array()) {
          $total += $datadetails['subtotal'];
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $datadetails['name']; ?></td>
          <td><?php echo $datadetails['stock']; ?></td>
          <td><?php echo $datadetails['price']; ?></td>
          <td><?php echo $datadetails['quantity']; ?></td>
          <td><?php echo $datadetails['subtotal']; ?></td>
          <td>
            <a href="transaksi.php?p=detail&id=<?php echo $datadetails['transaction_id']; ?>&a=hapus&id_detail=<?php echo $datadetails['id_detail']; ?>" 
               class="btn btn-primary btn-sm">Hapus</a>
          </td>
        </tr>
      <?php 
          $no++;
        }
      } else {
        echo "<tr><td colspan='7'>Data Tidak Ditemukan</td></tr>";
      }
      ?>
      <tr>
        <td colspan="5">Total</td>
        <td><?php echo $total; ?></td>
        <?php
        if ($data['paid_amount']>0) {
        ?>
        <tr>
          <td colspan="5">Jumlah Bayar</td><td><?php echo $data['paid_amount'];?></td>
        </tr>

        <tr>
          <td colspan="5">Kembalian</td><td><?php echo $data['change_amount'];?></td>
        </tr>
        <?php
      }else{
        ?>
      
      </tr>
      <tr>
        <td colspan="7">
          <br>
          <form method="POST">
            <div class="mb-3 mt-3">
              <label for="quantity">Jumlah Bayar:</label>
              <input type="number" name="total_amount" value="<?php echo $total; ?>" hidden>
              <input type="number" class="form-control" placeholder="Enter jumlah bayar" name="paid_amount" required>
            </div>
            <button type="submit" name="proses_bayar" value="Proses Bayar" class="btn btn-success col-lg-12">Bayar</button>
          </form>
        </td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>

