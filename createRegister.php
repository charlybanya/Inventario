<?php
session_start();
include './includes/bdOperations.php';
$type = ($_POST['type'] == 'newType' ? $_POST['newTypeId'] : $_POST['type']);
$newTypeId = $_POST['newTypeId'];
$newTypeDescription = $_POST['newTypeDescription'];
$subtype = ($_POST['subtype'] == 'newSubtype' ? $_POST['newSubtypeId'] : $_POST['subtype']);
$newSubtypeId = $_POST['newSubtypeId'];
$newSubtypeDescription = $_POST['newSubtypeDescription'];
$RESA = $_POST['RESA'];
$serial = $_POST['serial'];
$description = $_POST['description'];
$modelName = ($_POST['model'] == 'newModel' ? $_POST['newModelName'] : $_POST['model']);
$newModelName = $_POST['newModelName'];
$brandName = ($_POST['brand'] == 'newBrand' ? $_POST['newBrandName'] : $_POST['brand']);
$newBrandName = $_POST['newBrandName'];
$currentUser = $_SESSION['user'];
$currentDate = date("Y-m-d H:i:s");

insertNewData($newTypeId, $newTypeDescription, $newSubtypeId, $newSubtypeDescription, $newModelName, $newBrandName);
return createRegister($type, $subtype, $RESA, $serial, $description, $currentDate, $modelName, $brandName, $currentUser);

?>