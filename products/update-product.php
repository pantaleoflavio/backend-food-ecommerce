
<?php require_once "../includes/header.php"; ?>

<?php

if (isset($_POST['update'])) {
    $cart_id = $_POST['id'];
    $pro_qty = $_POST['pro_qty'];

    $update =  $cartController->updateQtyProductCart($pro_qty, $cart_id);

}

?>
<?php require_once "../includes/footer.php"; ?>