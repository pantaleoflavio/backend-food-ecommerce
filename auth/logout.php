
<?php require_once "../includes/header.php"; ?>
<?php

session_start();
session_unset();
session_destroy();
echo "<script>window.location.href='".APPURL."'</script>";

?>