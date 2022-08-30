<?php

session_start();
session_destroy();

unset($_SESSION['username']);
$user=null;

header('Location: login.php');
?>