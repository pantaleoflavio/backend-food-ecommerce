<?php require_once '../includes/header.php'; ?>

<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ". APPURL);
}

if (!isset($_GET['id'])) {
  header("Location: ". APPURL);
} else {
    $product_id = $_GET['id'];
    //Instantiate Product
    include "../../classes/db.classes.php";
    include "../classes/products.classes.php";
    include "../classes/products-contr.classes.php";
    $productsContr = new ProductsContr($product_id , $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null, $arg6 = null, $arg7 = null, $arg8 = null, $arg9 = null);
    $product = $productsContr->getSingleProduct();

    //Instantiate Categories
    include "../classes/categories.classes.php";
    include "../classes/categories-contr.classes.php";
    $categoriesContr = new CategoriesContr($arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null);
    $categories = $categoriesContr->getCategories();

    if (isset($_POST['submit'])) {
        $product_title = $_POST['name'];
        $product_description = $_POST['description'];

        $product_image = $_FILES['image']['name'];
        $product_image_temp = $_FILES['image']['tmp_name'];
    
        $target_directory = $_SERVER['DOCUMENT_ROOT'] . "/freshcherry/assets/img/";
        $target_path = $target_directory . $product_image;
    
        move_uploaded_file($product_image_temp, $target_path);
    
        $product_price = $_POST['price'];
        $product_qty = $_POST['qty'];
        $product_exp = $_POST['expiration'];
        $product_cat = $_POST['category'];
        $status = $_POST['status'];
    
        $updateProd = new ProductsContr($product_id, $product_title, $product_description, $product_image, $product_price, $product_qty, $product_exp, $product_cat, $status);
        $updateProd->updateProduct();
        header("Location: ". ADMINURL . "/products-admins/show-products.php");
      }
}



?>
<div class="row">
<div class="col">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Product</h5>
    <form method="POST" action="" enctype="multipart/form-data">
        <!-- Email input -->
        <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="name" value="<?php echo $product[0]['product_title'];  ?>" class="form-control" placeholder="name" />
            
        </div>
        <div class="form-outline mb-4 mt-4">
            <input type="text" name="description" id="description" value="<?php echo $product[0]['product_description'];  ?>" class="form-control" placeholder="Description" />
            
        </div>
        <div class="form-outline mb-4 mt-4">
            <img width="70" src="<?php echo APPURL; ?>/assets/img/<?php echo $product[0]['product_image']; ?>" alt="" id="image" class="img-size-sm">
            <input class="form-control" type="file" value="<?php echo $product[0]['product_image']; ?>" id="image" name="image">
        </div>

        <div class="form-outline mb-4 mt-4">
            <label for="price">price:</label>
            <input type="number" name="price" id="price" value="<?php echo $product[0]['product_price'];  ?>" class="form-control" step="0.01" placeholder="Description" />
        </div>
        <div class="form-outline mb-4 mt-4">
        <label for="expiration">expiration:</label>
            <input type="number" name="expiration" id="expiration" min="<?php echo $product[0]['exp_date'] ?>" max="2025" value="<?php echo $product[0]['exp_date']; ?>" class="form-control" placeholder="Description" />
        </div>

        <div class="form-outline mb-4 mt-4">
            <label for="qty">quantity:</label>
            <input type="number" name="qty" id="qty" min="0" value="<?php echo $product[0]['product_quantity'];  ?>" class="form-control form-control-qty" />
        </div>

        <div class="form-outline mb-4 mt-4">
            <label for="category">category:</label>
            <select name="category" id="category">
            <?php foreach($categories as $category) : ?>
                <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
            <?php endforeach;?>
            </select>
        </div>

        <div class="form-outline mb-4 mt-4">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="0">Not available</option>
                <option value="1">available</option>
            </select>
        </div>

        <!-- Submit button -->
        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

    
        </form>

    </div>
    </div>
</div>
</div>
<?php require_once '../includes/footer.php'; ?>

<script>
    $(document).ready(function() {
        $(".form-control-qty").keyup(function(){
            var value = $(this).val();
            value = value.replace(/^(0*)/,"");
            $(this).val(1);
        });

    })
</script>