<?php 
    session_start();
    define('ROOT', "http://" . $_SERVER['SERVER_NAME'] . "/freshcherry");
    define("ADMINURL", ROOT."/admin-panel");
    
?>

<?php 

if(!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}

if($_SESSION['role'] !== 'admin') {
  header("Location: ../index.php");
}

// INCLUDE THE CLASSES AND CONTROLLERS
include __DIR__ . "/../../classes/db.classes.php";
include __DIR__ . "/../classes/user-contr.classes.php";
include __DIR__ . "/../classes/category-contr.classes.php";
include __DIR__ . "/../classes/bill-contr.classes.php";
include __DIR__ . "/../classes/product-contr.classes.php";

// INIT CONTROLLERS

$billController = new BillController();
$usersContr = new UserContr();
$categoryContr = new CategoryContr();
$productContr = new ProductContr();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo ADMINURL ?>/styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="<?php echo $_COOKIE['appleader']; ?>">To the E-Commerce</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL ?>/admins/admins.php" style="margin-left: 20px;">Admins and Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL ?>/categories-admins/show-categories.php" style="margin-left: 20px;">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL ?>/products-admins/show-products.php" style="margin-left: 20px;">Products</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL ?>/orders-admins/show-orders.php" style="margin-left: 20px;">Orders</a>
          </li>
        
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL ?>/index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['username']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../../auth/logout.php">Logout</a>
          </li>
        </ul> 
      </div>
    </div>
    </nav>
    <div class="container-fluid">