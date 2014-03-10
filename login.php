<?php
session_start();
$_SESSION['user']= $_POST['user'];
//include 'includes/bdOperations.php';
header('Location: index.php'); 
?>