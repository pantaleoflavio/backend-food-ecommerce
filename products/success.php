
<?php 
    session_start();
    define("APPURL", "http://localhost/freshcherry");
?>
<?php require_once __DIR__ . '/../config/config.php'; ?>
<?php 

    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location: http://localhost/freshcherry/index.php');
        exit;
    }

    if(!isset($_SESSION['user_id'])) {
                
        echo "<script> window.location.href='".APPURL."'; </script>";

    }
    
    if(isset($_SESSION['user_id'])) {
        $deleteCart = $conn->prepare("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'");
        $deleteCart->execute();
        unset($_SESSION['total_bill']);
    
    }
   
?>

<!DOCTYPE html>
<html>
<head>
    <title>Freshcery | Groceries Organic Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="<?php echo APPURL; ?>/assets/fonts/sb-bistro/sb-bistro.css" rel="stylesheet" type="text/css">
    <link href="<?php echo APPURL; ?>/assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo APPURL; ?>/assets/packages/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo APPURL; ?>/assets/packages/o2system-ui/o2system-ui.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo APPURL; ?>/assets/packages/owl-carousel/owl-carousel.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo APPURL; ?>/assets/packages/cloudzoom/cloudzoom.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo APPURL; ?>/assets/packages/thumbelina/thumbelina.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo APPURL; ?>/assets/packages/bootstrap-touchspin/bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo APPURL; ?>/assets/css/theme.css">

</head>
<body>
    <div class="page-header">
        <!--=============== Navbar ===============-->
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent" id="page-navigation">
            <div class="container">
                <!-- Navbar Brand -->
                <a href="<?php echo APPURL; ?>/index.php" class="navbar-brand">
                    <img src="<?php echo APPURL; ?>/assets/img/logo/logo.png" alt="">
                </a>

            </div>
        </nav>
    </div>
<div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Payment has been a success 
                    </h1>
                    <p class="lead">
                        You can check your orders now.
                    </p>
                    <a href="<?php echo APPURL; ?>" class="btn btn-primary text-uppercase">home</a>

                  
                </div>
            </div>
</div>

<?php require "../includes/footer.php"; ?>