<?php
session_start();
include './includes/bdOperations.php';
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
} else {
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
            <table>
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Subtipo</th>
                        <th>ID</th>
                        <th>RESA</th>
                        <th>No. de Serie</th>
                        <th>Marca </th>
                        <th>Modelo </th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
<?php
    getTable();
?>
                </tbody>
            </table>
        </body>
    </html>

<?php } ?>
