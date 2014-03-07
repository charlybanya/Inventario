<?php
if (!isset($_SESSION)){
    session_start();
}

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
        <?php
        if (isset($_SESSION['user'])){
            
        }else{
        ?>
        <form id="Form" action="login.php" method="POST">
            <label>Usuario:</label><input name="user" autofocus="true" required="true" type="text" /><br />
            <label>Contraseña:</label><input name="pass" required="true" type="password" /><br />
            <input type="submit" name="login" value="Iniciar Sesión" />
        </form>
        <?php
        }
        ?>
    </body>
</html>
