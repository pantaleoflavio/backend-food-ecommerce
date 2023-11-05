<?php require_once "../includes/header.php"; ?>
<?php require_once "../config/config.php"; ?>
<?php 
if(isset($_SESSION['username'])) {
    echo "<script>window.location.href='" . APPURL . "'</script>";
} else {
    if (isset($_POST['submit'])) {
        // avoiding empty fields
        if (empty($_POST['email']) or empty($_POST['password'])) {
            echo "<script>alert('one or more inputs are empty')</script>";
        } else {
            $input_email = $_POST['email'];
            $input_password = $_POST['password'];

            //query
            $login = $conn->query("SELECT * FROM users WHERE user_email = '$input_email'");
            $login->execute();
            $fetch = $login->fetch(PDO::FETCH_ASSOC);

            //validate email
            if ($login->rowCount() > 0) {
                // validate password
                if (password_verify($input_password, $fetch['user_password'])) {

                    $_SESSION['user_id'] = $fetch['user_id'];
                    $_SESSION['user_fullname'] = $fetch['user_fullname'];
                    $_SESSION['user_email'] = $fetch['user_email'];
                    $_SESSION['username'] = $fetch['username'];
                    $_SESSION['user_image'] = $fetch['user_image'];
                    echo "<script>window.location.href='" . APPURL . "'</script>";
                } else {
                    echo "<script>alert('email or password is wrong')</script>";
                }
            } else {
                echo "<script>alert('email or password is wrong')</script>";
            }
        }
    }
}
?>


    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Login Page
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>

                    <div class="card card-login mb-5">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="login.php">
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="email" type="email" required="" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                                        <!-- <div class="checkbox">
                                            <input id="checkbox0" type="checkbox" name="remember">
                                            <label for="checkbox0" class="mb-0"> Remember Me? </label>
                                        </div> -->
                                        <!-- <a href="login.html" class="text-light"><i class="fa fa-bell"></i> Forgot password?</a> -->
                                    </div>
                                </div>
                                <div class="form-group row text-center mt-4">
                                    <div class="col-md-12">
                                        <button name="submit" type="submit" class="btn btn-primary btn-block text-uppercase">Log In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once "../includes/footer.php"; ?>
