<?php require_once '../includes/header.php'; ?>

<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ../../index.php");
}

  $categories = $categoryContr->getCategories();
  
  if (isset($_POST['create'])) {
    $product_title = $_POST['productTitle'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_qty = $_POST['qty'];
    $product_cat = $_POST['product_cat'];
    $exp_date = $_POST['exp_date'];
    $status = $_POST['status'];
    
    $product_image = $_FILES['image']['name'];
    $product_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($product_image_temp,  "../../assets/img/$product_image");

    $newProduct = $productContr->createSingleProduct($product_title, $product_description, $product_image, $product_price, $product_qty, $exp_date, $product_cat, $status);
    header("Location: show-products.php");
  }


?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Products</h5>
              <form method="POST" action="" enctype="multipart/form-data">

                <div class="form-outline mb-4 mt-4">
                  <label for="productTitle">Title</label>
                  <input type="text" name="productTitle" id="productTitle" class="form-control" placeholder="product title" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" placeholder="Price" />
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="description" rows="3"></textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="product_cat">category:</label>
                  <select name="product_cat" id="product_cat">
                  <?php foreach($categories as $category) : ?>
                      <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                  <?php endforeach;?>
                  </select>
                </div>

              <div class="form-group">
                  <label for="exp_date">Select Expiration Date</label>
                  <select name="exp_date" class="form-control" id="exp_date">
                    <option>--select expiration date--</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>

                  </select>
              </div>

                <div class="form-outline mb-4 mt-4">
                    <label for="image">Image</label>

                    <input type="file" name="image" id="image" class="form-control" placeholder="image" />
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="qty">quantity:</label>
                  <input type="number" name="qty" id="qty" min="0" class="form-control form-control-qty" />
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="status">Status:</label>
                  <select name="status" id="status">
                      <option value="0">Not available</option>
                      <option value="1">available</option>
                  </select>
                </div>
      
                <!-- Submit button -->
                <button type="submit" name="create" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require_once '../includes/footer.php'; ?>