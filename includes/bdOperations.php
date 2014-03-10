<?php

function getRoles() {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select *  from role";
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_all();
    foreach ($resultado as $key => $value) {
        echo '<option value="' . $value[0] . '">' . $value[1] . ' - ' . $value[2] . '</option>';
    }
    $mysqli->close();
}

function getTypes() {
    echo '<option value="" selected >Seleccionar...</option>';
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select *  from type";
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_all();
    foreach ($resultado as $key => $value) {
        echo '<option value="' . $value[0] . '">' . $value[0] . ' - ' . $value[1] . '</option>';
    }
    echo '<option value="newType" >Añadir Nuevo Tipo</option>';
    $mysqli->close();
}

function getSubtypes() {
    echo '<option value="" selected >Seleccionar...</option>';
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select *  from subType";
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_all();
    foreach ($resultado as $key => $value) {
        echo '<option value="' . $value[0] . '">' . $value[0] . ' - ' . $value[1] . '</option>';
    }
    echo '<option value="newSubtype" >Añadir Nuevo Subtipo</option>';
    $mysqli->close();
}

function getModels() {
    echo '<option value="" selected >Seleccionar...</option>';
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select *  from model";
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_all();
    foreach ($resultado as $key => $value) {
        echo '<option value="' . $value[1] . '">' . $value[0] . ' - ' . $value[1] . '</option>';
    }
    echo '<option value="newModel" >Añadir Nuevo Modelo</option>';
    $mysqli->close();
}

function getBrands() {
    echo '<option value="" selected >Seleccionar...</option>';
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select *  from brand";
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_all();
    foreach ($resultado as $key => $value) {
        echo '<option value="' . $value[1] . '">' . $value[0] . ' - ' . $value[1] . '</option>';
    }
    echo '<option value="newBrand" >Añadir Nueva Marca</option>';
    $mysqli->close();
}

function createUser($userName, $password, $idRole) {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "insert into user values ('" . $userName . "', '" . $password . "', '" . $idRole . "')";
    if (!$mysqli->query($query)) {
        echo '{ "message": "Hubo un problema al momento de crear el usuario, INFO: ' . str_replace('\'', '', $mysqli->error) . ' "}';
    } else {
        echo '{ "message": "El usuario a sido creado con exito", "nextStep" : "http://localhost/inventario/newUser.php"}';
    }
    $mysqli->close();
}

function createRegister($type, $subtype, $RESA = 'NA', $serial = 'SN', $description, $currentDate, $modelName, $brandName, $currentUser) {
    $id = getID($type, $subtype);
    $model = getModelID($modelName);
    $brand = getBrandID($brandName);
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "insert into inventory values('" . $type . "', '" . $subtype . "', '" . $id . "', '" . $RESA . "', '" . $serial . "', '" . $description . "', '" . $currentDate . "', '" . $model . "', '" . $brand . "', '" . $currentUser . "' )";
    if (!$mysqli->query($query)) {
        echo '{ "message": "Hubo un problema al momento de crear el Registro, INFO: ' . str_replace('\'', '', $mysqli->error) . ' "}';
    } else {
        echo '{ "message": "El Registro a sido creado con exito", "nextStep" : "http://localhost/inventario/newRegister.php"}';
    }
    $mysqli->close();
}

function insertNewData($newTypeId, $newTypeDescription, $newSubtypeId, $newSubtypeDescription, $newModelName, $newBrandName) {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "insert into type values ('" . $newTypeId . "', '" . $newTypeDescription . "')";
    $query2 = "insert into subtype values ('" . $newSubtypeId . "', '" . $newSubtypeDescription . "')";
    $query3 = "insert into model (modelName) values ( '" . $newModelName . "')";
    $query4 = "insert into brand (brandName) values ( '" . $newBrandName . "')";
    $mysqli->query($query);
    $mysqli->query($query2);
    $mysqli->query($query3);
    $mysqli->query($query4);
    $mysqli->close();
}

function getID($type, $subtype) {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select type_idtype, subType_idsubType, idinventroy from inventory where type_idtype like '" . $type . "' and subType_idsubType like '" . $subtype . "' order by idinventroy DESC";
    $mysqli->query($query);
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_array();
    $mysqli->close();
    return ($resultado['idinventroy'] == null ? 1 : $resultado['idinventroy'] + 1);
}

function getModelID($modelName) {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select * from model where modelName like '" . $modelName . "'";
    $mysqli->query($query);
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_array();
    $mysqli->close();
    return $resultado['idModel'];
}

function getBrandID($brandName) {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select * from brand where brandName like '" . $brandName . "'";
    $mysqli->query($query);
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_array();
    $mysqli->close();
    return $resultado['idBrand'];
}

function getModelName($modelID) {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select * from model where idModel = '" . $modelID . "'";
    $mysqli->query($query);
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_array();
    $mysqli->close();
    return $resultado['modelName'];
}

function getBrandName($brandID) {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select * from brand where idBrand = '" . $brandID . "'";
    $mysqli->query($query);
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_array();
    $mysqli->close();
    return $resultado['brandName'];
}

function getTable() {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select * from inventory";
    $mysqli->query($query);
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_all();
    foreach ($resultado as $key => $value) {
        echo "\t\t\t\t\t".'<tr>'."\r\n";
        echo "\t\t\t\t\t\t".'<td>'.$value['0'].'</td>'."\r\n";
        echo "\t\t\t\t\t\t".'<td>'.$value['1'].'</td>'."\r\n";
        echo "\t\t\t\t\t\t".'<td>'.$value['2'].'</td>'."\r\n";
        echo "\t\t\t\t\t\t".'<td>'.$value['3'].'</td>'."\r\n";
        echo "\t\t\t\t\t\t".'<td>'.$value['4'].'</td>'."\r\n";
        echo "\t\t\t\t\t\t".'<td>'.getBrandName($value['8']).'</td>'."\r\n";
        echo "\t\t\t\t\t\t".'<td>'.getModelName($value['7']).'</td>'."\r\n";
        echo "\t\t\t\t\t\t".'<td>'.$value['5'].'</td>'."\r\n";
        echo "\t\t\t\t\t".'</tr>'."\r\n";
    }
    $mysqli->close();
}

?>