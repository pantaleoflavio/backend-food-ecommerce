<?php require_once '../includes/header.php'; ?>

<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ". APPURL);
}

if (!isset($_GET['id'])) {
  header("Location: ". APPURL);
} else {
  $category_id = $_GET['id'];
  //Instantiate Class
  include "../../classes/db.classes.php";
  include "../classes/categories.classes.php";
  include "../classes/categories-contr.classes.php";
  $categoriesContr = new CategoriesContr($category_id, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null);
  $singleCat = $categoriesContr->getSingleCategory();

  if (isset($_POST['submit'])) {
    $cat_name = $_POST['name'];
    $cat_image = $_FILES['image']['name'];
    $cat_image_temp = $_FILES['image']['tmp_name'];

    $target_directory = $_SERVER['DOCUMENT_ROOT'] . "/freshcherry/assets/img/";
    $target_path = $target_directory . $cat_image;

    move_uploaded_file($cat_image_temp, $target_path);

    $cat_description = $_POST['description'];
    $cat_icon = $_POST['icon'];

    $categoriesContr = new CategoriesContr($category_id, $cat_name, $cat_image, $cat_description, $cat_icon);
    $categoriesContr->updateCategory();
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
                  <input type="text" name="name" id="name" value="<?php echo $singleCat[0]['category_name'];  ?>" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="description" id="description" value="<?php echo $singleCat[0]['category_description'];  ?>" class="form-control" placeholder="Description" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <img width="70" src="<?php echo APPURL; ?>/assets/img/<?php echo $singleCat[0]['category_image']; ?>" alt="" id="image" class="img-size-sm">
                  <input class="form-control" type="file" value="<?php echo $singleCat[0]['category_image']; ?>" id="image" name="image">
                </div>

                <div class="form-outline mb-4 mt-4">
                  <span class="d-flex mr-2"><i class="sb-<?php echo $singleCat[0]['category_icon']; ?>"></i></span>
                  <input type="text" name="icon" id="icon" value="<?php echo $singleCat[0]['category_icon'];  ?>" class="form-control" placeholder="icon" />
                 
                </div>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require_once '../includes/footer.php'; ?>