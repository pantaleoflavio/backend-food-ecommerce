<?php require_once "../includes/header.php"; ?>
<?php require_once __DIR__ . '/../config/config.php'; ?>
<?php 

    if(!isset($_SESSION['user_id'])) {
                
        echo "<script> window.location.href='".ROOT."'; </script>";

    }
    
    if(isset($_SESSION['user_id'])) {
        $deleteCart = $cartController->deleteCart($_SESSION['user_id']);
    }
   
?>

<div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo ROOT; ?>/assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Payment has been a success 
                    </h1>
                    <p class="lead">
                        You can check your orders now.
                    </p>
                    <a href="<?php echo ROOT; ?>" class="btn btn-primary text-uppercase">home</a>

                  
                </div>
            </div>
</div>

<?php require "../includes/footer.php"; ?>