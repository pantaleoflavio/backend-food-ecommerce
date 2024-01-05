<?php require_once '../includes/header.php'; ?>

<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ../../index.php");
}

if (!isset($_GET['id'])) {
  header("Location: ../index.php");
} else {
  $category_id = $_GET['id'];
  //Instantiate Class
  include "../../classes/db.classes.php";
  include "../classes/category-contr.classes.php";
  $categoryContr = new CategoryContr();
  $category = $categoryContr->getSingleCategory($category_id);

  if (isset($_POST['submit'])) {
    $cat_name = $_POST['name'];
    $cat_description = $_POST['description'];
    $cat_icon = $_POST['icon'];

    $cat_image = $_FILES['image']['name'];
    $cat_image_temp = $_FILES['image']['tmp_name'];

    if (!empty($_FILES['image']['name'])) {
      $cat_image = $_FILES['image']['name'];
      $cat_image_temp = $_FILES['image']['tmp_name'];
      move_uploaded_file($cat_image_temp,  "../../assets/img/$cat_image");
  } else {
      $cat_image = $category->category_image;
  }

    $categoryUpdate = $categoryContr->updateSingleCategory($category_id, $cat_name, $cat_image, $cat_description, $cat_icon);
    echo "<script>window.location.href='show-categories.php'</script>";
  }

}



?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="name" value="<?php echo $category->category_name;  ?>" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="description" id="description" value="<?php echo $category->category_description;  ?>" class="form-control" placeholder="Description" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <img width="70" src="../../assets/img/<?php echo $category->category_image; ?>" alt="" id="image" class="img-size-sm">
                  <input class="form-control" type="file" value="<?php echo $category->category_image; ?>" id="image" name="image">
                </div>

                <div class="form-outline mb-4 mt-4">
                <label for="icon" class="form-label">Icon Name:</label>
                  <input type="text" name="icon" id="icon" value="<?php echo $category->category_icon;  ?>" class="form-control" placeholder="icon" />
                 
                </div>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require_once '../includes/footer.php'; ?>