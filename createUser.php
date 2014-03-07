<?php
include './includes/bdOperations.php';
$user = $_POST['user'];
$password = md5($_POST['password']);
$idRole = $_POST['role'];
return createUser($user, $password, $idRole);
?>