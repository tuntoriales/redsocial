<?php
session_start();

unset($_SESSION['usuario']);
unset($_SESSION['id']);

session_destroy();

header("Location: login.php");
?>