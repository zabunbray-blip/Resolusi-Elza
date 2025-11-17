<?php
include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aplikasi Kasir - Data User</title>
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
        <li><a href="#" class="active">Home</a></li>
        <li ><a href="users.php">Users</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="categories.php">categories</a></li>
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
   <?php
    $p=@$_GET['p'];
    if ($p=="login"){
      include "login.php";
    }else{
    ?>
  <div class="col-sm-2 sidenav">
    <p>
      <a href="index.php?p=login" class="btn btn-primary col-lg-12">Login</a>
    </p>
    <?php include "login.php";?>
  </div>
  <div class="col-sm-8 text-left">
    <h1>Welcome</h1>

    <h3>SELAMAT DATANG </h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <hr>

  </div>
  <div class="col-sm-2" sidenav>
    <div class="well">
      <p>ADS</p>
    </div>
    <div class="well">
      <p>ADS</p>
    </div>
  </div>
    <?php
    }
  ?>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>