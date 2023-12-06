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

  if (isset($_POST['delete'])) {
    
    $categoriesContr->deleteCategory($category_id);
    header("Location: ". ADMINURL. "/categories-admins/show-categories.php");
  }

}



?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Delete Categories</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="mb-4 mt-4">
                  <div id="name" class=""><?php echo $singleCat[0]['category_name'];  ?></div>
                </div>
                <div class="mb-4 mt-4">

                  <div id="description" class=""><?php echo $singleCat[0]['category_description'];  ?></div>
                 
                </div>
                <div class="mb-4 mt-4">
                  <img width="70" src="<?php echo APPURL; ?>/assets/img/<?php echo $singleCat[0]['category_image']; ?>" alt="" id="image" class="img-size-sm">
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="delete" class="btn btn-danger  mb-4 text-center">Delete</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require_once '../includes/footer.php'; ?>