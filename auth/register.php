<?php require_once "../includes/header.php"; ?>
<?php require_once "../config/config.php"; ?>
<?php
if(isset($_SESSION['username'])) {
    echo "<script>window.location.href='../index.php'</script>";
} else {
    if (isset($_POST['submit'])) {
        // saving input parameters in variables
        $user_fullname = $_POST['user_fullname'];
        $user_email = $_POST['user_email'];
        $username = $_POST['username'];
        $user_image = 'user.png';
        $user_password = $_POST['user_password'];
        $confirm_password = $_POST['confirm_password'];

        //Instantiate SignupContr Class

        include "../classes/signup.classes.php";
        include "../classes/signup-contr.classes.php";
        $signup = new SignupContr($user_fullname, $user_email, $username, $user_image, $user_password, $confirm_password);

        //Running error handlers and user signup
        $signup->signupUser();

        // Going to back to front page
        echo "<script>alert('Register successfully
        ')</script>";
        header("location: login.php");

    }
}

?>
<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('../assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Register Page
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>

                <div class="card card-login mb-5">
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="register.php">
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" name="user_fullname" type="text" required="" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" name="user_email" type="email" required="" placeholder="Email">
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" name="user_password" type="password" required="" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" name="confirm_password" type="password" required="" placeholder="Confirm Password">
                                </div>
                            </div>
                            <!--
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <input id="checkbox0" type="checkbox" name="terms">
                                        <label for="checkbox0" class="mb-0">I Agree with <a href="terms.html" class="text-light">Terms & Conditions</a> </label>
                                    </div>
                                </div>
                            </div>
                            -->
                            <div class="form-group row text-center mt-4">
                                <div class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Register</button>
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