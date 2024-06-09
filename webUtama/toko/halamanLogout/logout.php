<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// Menghancurkan cookie login
setcookie('login', '', time() - 3600, "/");
setcookie('username', '', time() - 3600, "/");
setcookie('password', '', time() - 3600, "/");

header("Location: ../index.php");
exit;
?>
