<?php require_once '../includes/header.php'; ?>
<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ../../index.php");
}


//Instantiate Cats
include "../../classes/db.classes.php";
include "../classes/categories.classes.php";
include "../classes/categories-contr.classes.php";
$categoriesContr = new CategoriesContr($arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null);
$categories = $categoriesContr->getCategories();

//Instantiate Products
include "../classes/products.classes.php";
include "../classes/products-contr.classes.php";


?>

<?php foreach($categories as $category) : ?>
<?php
$cat_id = $category->category_id;
$productsContr = new ProductsContr($arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null, $arg6 = null, $arg7 = null, $cat_id, $arg9 = null);
$products = $productsContr->listProducts();

?>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline"><?php echo $category->category_name; ?></h5>
          <table class="table">
            <thead>
            
              <tr>
                <th scope="col">#</th>
                <th scope="col">product</th>
                <th scope="col">description</th>
                <th scope="col">price in €</th>
                <th scope="col">expiration date</th>
                <th scope="col">Qty</th>
                <th scope="col">image</th>
                <th scope="col">status</th>
                <th scope="col">modify</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($products as $product) : ?>
                <tr>
                  <th scope="row">1</th>
                  <td><?php echo $product->product_title; ?></td>
                  <td><?php echo $product->product_description; ?></td>
                  <td><?php echo $product->product_price; ?></td>
                  <td><?php echo $product->exp_date; ?></td>
                  <td><?php echo $product->product_quantity; ?></td>
                  <td><img src="../../assets/img/<?php echo $product->product_image; ?>" class="img-thumbnail" width="70" alt=""></td>
                  <?php if($product->status === 1) : ?>
                    <td class="text-success text-center ">available</td>
                  <?php else :?>
                    <td class="text-danger text-center ">not available</td>
                  <?php endif;?>
                    <td><a href="update-product.php?id=<?php echo $product->product_id; ?>" class="btn btn-warning  text-center ">modify</a></td>
                    <td><a href="#" class="btn btn-danger  text-center ">delete</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <a  href="create-products.php" class="btn btn-primary mb-4 text-center float-left">Create Products</a>
        </div>
      </div>
    </div>
  </div>

      <?php require_once '../includes/footer.php'; ?>