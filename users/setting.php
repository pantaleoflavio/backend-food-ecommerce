<?php require_once "../includes/header.php"; ?>
<?php require_once "../config/config.php"; ?>

<?php
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $_GET['id']) {
    $id = $_SESSION['user_id'];
    $user = $conn->query("SELECT * FROM users WHERE user_id = '$id'");
    $user->execute();
    $userData = $user->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['submit'])) {

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        $user_pic = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($user_image_temp,  "../assets/img/users/$user_pic");
        
        $update = $conn->prepare("UPDATE users SET user_fullname=:fullname, user_email=:email, username=:username, user_image=:user_pic WHERE user_id='$id'");
        $update->bindParam(':fullname', $fullname);
        $update->bindParam(':email', $email);
        $update->bindParam(':username', $username);
        $update->bindParam(':user_pic', $user_pic);
        $update->execute();
        echo "<script>window.location.href='" . APPURL . "/users/setting.php?id=".$_SESSION['user_id']."'</script>";
    }

} else {
    echo "<script>window.location.href='" . APPURL . "'</script>";
}


?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('../assets//img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Settings
                    </h1>
                    <p class="lead">
                        Update Your Account Info
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-6">
                        <h5 class="mb-3">ACCOUNT DETAILS</h5>
                        <!-- Account Detail of the Page -->
                        <form method="POST" class="bill-detail" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col">
                                        <input name="fullname" class="form-control" placeholder="Full Name" type="text" value="<?php echo $userData['user_fullname']; ?>">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $userData['user_email']; ?>">
                                </div>
                                <div class="form-group">
                                    <input name="username" class="form-control" placeholder="Username" type="text" value="<?php echo $userData['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label for="immagine">Select a new image:</label>
                                    </div>
                                    <img width="150" src="<?php echo APPURL; ?>/assets/img/users/<?php echo $userData['user_image']; ?>" alt="" id="image" name="image" class="img-size-sm">
                                    <input class="form-control" type="file" id="image" name="image" value="<?php echo $userData['user_image']; ?>">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                                    <div class="clearfix">
                                </div>
                            </fieldset>
                        </form>
                        <!-- Account Detail of the Page end -->
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php require_once "../includes/footer.php"; ?>

