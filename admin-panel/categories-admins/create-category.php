<?php require_once '../includes/header.php'; ?>
<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ../../index.php");
}

  //Instantiate Class
  include "../../classes/db.classes.php";
  include "../classes/category-contr.classes.php";
  $categoryContr = new CategoryContr();
  


  if (isset($_POST['create'])) {
    $cat_name = $_POST['name'];
    $cat_description = $_POST['description'];
    $cat_icon = $_POST['icon'];

    $cat_image = $_FILES['image']['name'];
    $cat_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($cat_image_temp,  "../../assets/img/$cat_image");

    $newCategory = $categoryContr->createSingleCategory($cat_name, $cat_image, $cat_description, $cat_icon);
    header("Location: ". ADMINURL. "/categories-admins/show-categories.php");
  }


?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Categories</h5>
              <form method="POST" action="" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="icon" id="form2Example1" class="form-control" placeholder="name of the icon" />      
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-outline mb-4 mt-4">
                  <label>Image</label>

                  <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="create" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require_once '../includes/footer.php'; ?>