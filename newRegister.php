<?php
if (!isset($_SESSION['user'])){
    header('Location:index.php');
}else{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/jquery.form.min.js"></script>
        <script src="js/inventario.js"></script>
        <title>Sistema de Inventario Telmexhub</title>
    </head>
    <body>
        
    </body>
<?php } ?>
