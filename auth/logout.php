

<?php

session_start();
session_unset();
session_destroy();

echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/freshcherry'</script>";

?>