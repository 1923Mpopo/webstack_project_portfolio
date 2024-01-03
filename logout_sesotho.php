<?php

@include 'config.php';
session_start();
$_SESSION = array();
setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();


header('Location:feedback_sesotho.php');


?>

