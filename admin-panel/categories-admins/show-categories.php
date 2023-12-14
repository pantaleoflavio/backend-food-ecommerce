<?php require_once '../includes/header.php'; ?>

<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ../../index.php");
}


//Instantiate Classes
include "../../classes/db.classes.php";
include "../classes/categories.classes.php";
include "../classes/categories-contr.classes.php";
$categoriesContr = new CategoriesContr($arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null);
$categories = $categoriesContr->getCategories();



?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">icon name</th>
                    <th scope="col">image</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $category) : ?>
                  <tr>
                    <td scope="row"><?php echo $category->category_id; ?></td>
                    <td><?php echo $category->category_name; ?></td>
                    <td><?php echo $category->category_description; ?></td>
                    <td><?php echo $category->category_icon; ?></td>
                    <td><img src="../../assets/img/<?php echo $category->category_image; ?>" class="img-thumbnail" width="70" alt=""></td>
                    <td><a  href="update-category.php?id=<?php echo $category->category_id; ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="delete-category.php?id=<?php echo $category->category_id; ?>" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



      <?php require_once '../includes/footer.php'; ?>