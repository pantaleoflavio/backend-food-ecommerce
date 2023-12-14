<?php require_once '../includes/header.php'; ?>
<?php
if($_SESSION['role'] !== 'admin') {
  header("Location: ../../index.php");
}


//Instantiate SignupContr Class
include "../../classes/db.classes.php";
include "../classes/users.classes.php";
include "../classes/users-contr.classes.php";
$usersContr = new UsersContr();
$admins = $usersContr->getAdmins();
$users = $usersContr->getUsers();



if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];
  $setAdmin = $usersContr->setAdmin($user_id);
  header("Location: ". ADMINURL . "/admins/admins.php");
}

if (isset($_GET['admin_id'])) {
  $admin_id = $_GET['admin_id'];
  $setUser = $usersContr->setUser($admin_id);
  header("Location: ". ADMINURL . "/admins/admins.php");
}




?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">username</th>
                    <th scope="col">image</th>
                    <th scope="col">registration at</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($admins as $admin) : ?>
                  <tr>
                    <td scope="row"><?php echo $admin->user_id; ?></td>
                    <td><?php echo $admin->user_fullname; ?></td>
                    <td><?php echo $admin->user_email; ?></td>
                    <td><?php echo $admin->username; ?></td>
                    <td><img width="70" src="../../assets/img/users/<?php echo $admin->user_image; ?>" alt="" class="img-thumbnail"></td>
                    <td><?php echo $admin->created_at; ?></td>
                    <td><a class="btn btn-primary" href="admins.php?admin_id=<?php echo $admin->user_id; ?>">set User</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Users</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">username</th>
                    <th scope="col">image</th>
                    <th scope="col">registration at</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user) : ?>
                  <tr>
                    <td scope="row"><?php echo $user->user_id; ?></td>
                    <td><?php echo $user->user_fullname; ?></td>
                    <td><?php echo $user->user_email; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td><img width="70" src="../../assets/img/users/<?php echo $user->user_image; ?>" alt="" class="img-thumbnail"></td>
                    <td><?php echo $user->created_at; ?></td>
                    <td><a class="btn btn-primary" href="admins.php?user_id=<?php echo $user->user_id; ?>">set Admin</a></td>
                    
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
          
          <div class="card">
            <div class="card-body">
            <a  href="create-admins.php" class="btn btn-primary mb-4 text-center">Create User</a>
            </div>
          </div>


        </div>
      </div>



      <?php require_once '../includes/footer.php'; ?>