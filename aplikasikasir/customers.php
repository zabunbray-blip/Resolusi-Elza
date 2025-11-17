<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aplikasi Kasir - Data Customers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="users.php">Users</a></li>
        <li class="active"><a href="customers.php">Customers</a></li>
        <li><a href="categories.php">Categories</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="transaksi.php">Transaksi</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p>
        <a href="customers.php?p=tambah" class="btn btn-primary col-lg-12">Tambah</a>
      </p>
    </div>
    <div class="col-sm-8 text-left"> 
      <div class="col-lg-12 mt-3">
        <h2>Data Customers</h2>
        <p>
        <?php
        $p = @$_GET['p'];
        if($p == "tambah"){
          include "customers/tambah.php";
        }else if($p=="edit"){
          include "customers/edit.php";
        }else if($p=="hapus"){
          include "customers/hapus.php";
        }
        ?>
        </p>            
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="col-lg-1">No</th>
              <th class="col-lg-3">Name</th>
              <th class="col-lg-2">Phone</th>
              <th class="col-lg-2">Email</th>
              <th class="col-lg-2">Created_at</th>
              <th class="col-lg-2" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "select * from customers";
            $result = $koneksi->query($sql);
            $no=1;
            if($result->num_rows > 0){
              while($data = $result->fetch_array()){
              ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data['name'];?></td>
                <td><?php echo $data['phone'];?></td>
                <td><?php echo $data['email'];?></td>
                <td><?php echo $data['created_at'];?></td>
                <td>  
                  <a href="customers.php?p=edit&id=<?php echo $data['id_pelanggan'];?>" class="btn btn-primary btn-sm">
                    Edit
                  </a>
                </td>
                <td>
                  <a href="customers.php?p=hapus&id=<?php echo $data['id_pelanggan'];?>" class="btn btn-primary btn-sm">
                    Hapus
                  </a>
                </td>
              </tr>
              <?php
                $no++;
              }
            }else{
              echo "<td colspan='6'>Data Tidak Ditemukan</td>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
