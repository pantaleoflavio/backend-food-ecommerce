<?php require_once "../includes/header.php"; ?>
<?php require_once "../config/config.php"; ?>

<?php

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $delete = $conn->prepare("DELETE FROM cart WHERE cart_id='$id'");
    $delete->execute();
}

?>

<?php require_once "../includes/footer.php"; ?>