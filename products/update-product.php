
<?php require_once "../includes/header.php"; ?>
<?php require_once "../config/config.php"; ?>

<?php

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $pro_qty = $_POST['pro_qty'];

    $update = $conn->prepare("UPDATE cart SET pro_qty='$pro_qty' WHERE cart_id='$id'");
    $update->execute();
}

?>
<?php require_once "../includes/footer.php"; ?>