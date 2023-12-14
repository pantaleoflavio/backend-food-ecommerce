<?php 
    session_start();


    if (!isset($_COOKIE['appleader'])) {
        setcookie("appleader", "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], time() + 43200, "/");
    }
    
    //echo $_COOKIE['appleader'] .' sono fuori if';

    //define("APPURL", ".");


?>
<?php require_once "functions.php";?>
<?php require_once __DIR__ . '/../config/config.php'; ?>

<?php
    //Update number of products on screen
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = $conn->prepare("SELECT * FROM cart WHERE user_id = {$id}");
        $query->execute();
        $cartProducts = $query->fetchAll(PDO::FETCH_OBJ);

        $user = $conn->query("SELECT * FROM users WHERE user_id = '$id'");
        $user->execute();
        $userData = $user->fetch(PDO::FETCH_ASSOC);

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
    <link href="<?php echo $_COOKIE['appleader']; ?>/assets/fonts/sb-bistro/sb-bistro.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_COOKIE['appleader']; ?>/assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $_COOKIE['appleader']; ?>/assets/packages/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $_COOKIE['appleader']; ?>/assets/packages/o2system-ui/o2system-ui.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $_COOKIE['appleader']; ?>/assets/packages/owl-carousel/owl-carousel.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $_COOKIE['appleader']; ?>/assets/packages/cloudzoom/cloudzoom.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $_COOKIE['appleader']; ?>/assets/packages/thumbelina/thumbelina.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $_COOKIE['appleader']; ?>/assets/packages/bootstrap-touchspin/bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $_COOKIE['appleader']; ?>/assets/css/theme.css">

</head>
<body>
    <div class="page-header">
        <!--=============== Navbar ===============-->
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent" id="page-navigation">
            <div class="container">
                <!-- Navbar Brand -->
                <a href="<?php echo $_COOKIE['appleader']; ?>/index.php" class="navbar-brand">
                    <img src="<?php echo $_COOKIE['appleader']; ?>/assets/img/logo/logo.png" alt="">
                </a>

                <!-- Toggle Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarcollapse">
                    <!-- Navbar Menu -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="<?php echo $_COOKIE['appleader']; ?>/shop.php" class="nav-link">Shop</a>
                        </li>

                        <!-- Session validation with if condition -->
                        <?php if(!isset($_SESSION['username'])) : ?>
                        <li class="nav-item">
                            <a href="<?php echo $_COOKIE['appleader']; ?>/auth/register.php" class="nav-link">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $_COOKIE['appleader']; ?>/auth/login.php" class="nav-link">Login</a>
                        </li>

                        <!-- Session validation else condition -->
                        <?php else : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar-header"><img src="<?php echo $_COOKIE['appleader'];?>/assets/img/users/<?php echo $userData['user_image']; ?>"></div> <?php echo $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo $_COOKIE['appleader']; ?>/users/transaction.php?id=<?php echo $_SESSION['user_id']; ?>">Transactions History</a>
                                <a class="dropdown-item" href="<?php echo $_COOKIE['appleader']; ?>/users/setting.php?id=<?php echo $_SESSION['user_id']; ?>">Settings</a>
                                <?php if($_SESSION['role'] === 'admin') : ?>
                                <a class="dropdown-item" href="<?php echo $_COOKIE['appleader']; ?>/admin-panel/index.php?id=<?php echo $_SESSION['user_id']; ?>">Admin Panel</a>
                                <?php endif; ?>
                                <a class="dropdown-item" href="<?php echo $_COOKIE['appleader'];?>/auth/logout.php">log out</a>
                            </div>
                        </li>
                        
                        <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-shopping-basket"></i> <span class="badge badge-primary"><?php echo count($cartProducts); ?></span>
                            </a>
                            <div class="dropdown-menu shopping-cart">
                        
                                <ul>
                                    <li>
                                        <div class="drop-title">Your Cart</div>
                                    </li>

                                    <!-- Cart empty/not validation if condition -->
                                    <?php if(count($cartProducts) > 0) : ?>
                                    <li>
                                        <div class="shopping-cart-list">
                                            <?php foreach($cartProducts as $cartProduct) : ?>
                                                <div class="media">
                                                    <img class="d-flex mr-3" src="<?php echo $_COOKIE['appleader']; ?>/assets/img/<?php echo $cartProduct->pro_image; ?>" width="60">
                                                    <div class="media-body">
                                                        <h5><a href="<?php echo $_COOKIE['appleader'] ?>/products/detail-product.php?id=<?php echo $cartProduct->pro_id; ?>"><?php echo $cartProduct->pro_title; ?></a></h5>
                                                        <p class="price">
                                                            <span>€ <?php echo $cartProduct->pro_price; ?></span>
                                                        </p>
                                                        <p class="text-muted">Qty: <?php echo $cartProduct->pro_qty; ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <div class="drop-title d-flex justify-content-between">
                                            <span>Total:</span>
                                                <?php
                                                    $cartSubtot = array();
                                                    foreach ($cartProducts as $cartProduct) {
                                                        $singleSubtot = $cartProduct->pro_qty * $cartProduct->pro_price;
                                                        $cartSubtot[] = $singleSubtot;
                                                    } 
                                                ?>
                                            <span class="text-primary"><strong>€ <?php echo array_sum($cartSubtot) ?></strong></span>
                                        </div>
                                    </li>
                                    <!-- Cart empty/not validation else condition -->
                                    <?php else : ?>
                                        <li>
                                        <div class="drop-title">Is Empty</div>
                                        </li>
                                    <!-- END if condition CART EMPTY -->
                                    <?php endif; ?>
                                    <li class="d-flex justify-content-between pl-3 pr-3 pt-3">
                                        <a href="<?php echo $_COOKIE['appleader']; ?>/products/cart.php" class="btn btn-default">View Cart</a>
                                        <a href="<?php echo $_COOKIE['appleader']; ?>/checkout.php" class="btn btn-primary">Checkout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- END if condition USER SESSION -->
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
        </nav>