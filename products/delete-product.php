
<?php require_once "../includes/header.php"; ?>

<?php

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $deleteProductFromCart = $cartController->deleteProductFromCart($id);
}
?>

<?php require_once "../includes/footer.php"; ?>