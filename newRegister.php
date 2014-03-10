<?php
include './includes/bdOperations.php';
session_start();
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
        <link rel="stylesheet" href="css/newRegister.css" type="text/css" />
        <title>Sistema de Inventario Telmexhub</title>
    </head>
    <body>
        <form id="Form" action="createRegister.php" method="POST">
            <p>Tipo:
                <select name="type" required="TRUE">
                    <?php
                    getTypes();
                    ?>
                </select></p>
            <div id="addType">
                <p><label>Identificador de Tipo: </label><input type="text" name="newTypeId" size="2" />
                    <label>Descripción del Tipo: </label><input type="text" name="newTypeDescription" /></p>
            </div>
            <p>Subtipo: <select name="subtype" required="TRUE">
                    <?php
                    getSubtypes();
                    ?>
                </select></p>
            <div id="addSubtype">
                <p><label>Identificador de Subtipo: </label><input type="text" name="newSubtypeId" size="2" />
                    <label>Descripción del Subtipo: </label><input type="text" name="newSubtypeDescription" /></p>
            </div>
            <p>
                <label>RESA: </label><input type="text" name="RESA" />
            </p>
            <p>
                <label>No. de Serie: </label><input type="text" name="serial" />
            </p>
            <p>
                <label>Descripción: </label><textarea name="description" required="TRUE"></textarea>
            </p>
            <p>Modelo:
                <select name="model" required="TRUE" >
                    <?php
                    getModels();
                    ?>
                </select></p>
            <div id="addModel">
                <p><label>Nuevo Modelo: <input type="text" name="newModelName" /></label></p>
            </div>
            <p>Marca: 
                <select name="brand" required="TRUE">
                    <?php
                    getBrands();
                    ?>
                </select></p>
            <div id="addBrand">
                <p><label>Nueva Marca: <input type="text" name="newBrandName" /></label></p>
            </div>
                <p>
                    <input type="submit" name="createRegister" value="Añadir Registro" />
                </p>
        </form>
    </body>
</html>
<?php } ?>
