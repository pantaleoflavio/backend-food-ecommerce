<?php require_once 'includes/header.php'; ?>

<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ". APPURL);
}
//Instantiate Counts Class
include "../classes/db.classes.php";
include "classes/counts.classes.php";
$counts = new Counts();


?>

            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of products: <?php echo $counts->numberProducts(); ?> </p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of orders: <?php echo $counts->numberOrders(); ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $counts->numberCategories(); ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              
              <p class="card-text">number of users: <?php echo $counts->numberUsers(); ?></p>
              
            </div>
          </div>
        </div>
      </div>
  
          
    </div>
  <?php require_once 'includes/footer.php'; ?>