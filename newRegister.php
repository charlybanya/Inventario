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
        <link rel="stylesheet" href="newRegister.css" type="text/css" />
        <title>Sistema de Inventario Telmexhub</title>
    </head>
    <body>
        <form id="Form" action="createRegister.php" method="POST">
            <label>Tipo: </label><select name="type" required="TRUE">
                <?php
                getTypes();
                ?>
            </select> 
            <div id="addType">
                <label>Identificador de Tipo</label><input type="text" name="newTypeId" />
                <label>Descripción del Tipo</label><input type="text" name="newTypeDescription" />
            </div>
        </form>
    </body>
</html>
<?php //} ?>
