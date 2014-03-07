<?php
include './includes/bdOperations.php';
/* if (!isset($_SESSION['user'])){
  header('Location:index.php');
  }else{ */
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
        <form id="Form" method="POST" action="createUser.php">
            <label>Usuario: </label><input type="text" name="user" autofocus="TRUE" required="TRUE"><br />
            <label>Contraseña: </label><input type="password" name="password" required="TRUE"><br />
            <label>Rol: </label><select name="role">
                <?php
                getRoles();
                ?>
            </select>
            <br /><input type="submit" name="createUser" value="Crear Usuario" />
        </form>

    </body>
</html>

