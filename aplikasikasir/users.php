<?php
include "koneksi.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aplikasi Kasir - Data Users</title>
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
    img{
      width: 150px;
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
      <a class="navbar-brand" href="#">LOGO</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php" >Home</a></li>
        <li class="active"><a href="users.php">Users</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="categories.php">Categories</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="transaksi.php">Transaction</a></li>
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
      <p><a href="users.php?p=tambah" class="btn btn-success col-lg-12">Add Users</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <div class="col-lg-12 mt-3">
        <h2>Data Users</h2>
        <p>
         <?php
          $p= @$_GET['p'];
          if($p=="tambah") {
            include "users/tambah.php";
          }elseif ($p=="edit") {
            include 'users/edit.php';
          }elseif ($p=="hapus") {
            include 'users/hapus.php';
          }
         ?> 
        </p>            
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="col-lg-1">No</th>
              <th class="col-lg-3">Username</th>
              <th class="col-lg-3">Password</th>
              <th class="col-lg-3">Role</th>
              <th class="col-lg-3">created_at</th>
              <th colspan="2" class="col-lg-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql = "select * from users"; //fungsi mengambil table data
            $result = $koneksi->query($sql);
            $no =1;
            if ($result->num_rows > 0) {
              while($data = $result->fetch_array()){
            
             ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $data['username'];?></td>
              <td><?php echo $data['password'];?></td>
              <td><?php echo $data['role'];?></td>
              <td><?php echo $data['created_at'];?></td>
              <td>
               <a href="users.php?p=edit&id=<?php echo $data['id'];?>" class="btn btn-primary btn-sm">Edit</a>
              </td>
              <td>
               <a href="users.php?p=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
            <?php
            $no++; 
          }
        }else{
          echo "<tr><td colspan='5'>Data Tidak Ditemukan</td></tr>";
        }
             ?>
          </tbody>
        </table>
      </div>
      </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <img src="shope.jpg" alt="logo">
      </div>
      <div class="well">
        <img src="ff.png" alt="logo">
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Elza Fikri Dinata</p>
</footer>

</body>
</html>
