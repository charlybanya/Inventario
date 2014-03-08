<?php

function getRoles() {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select *  from role";
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_all();
    foreach ($resultado as $key => $value) {
        echo '<option value="'.$value[0].'">'.$value[1].' - '.$value[2].'</option>';
    }
    $mysqli->close();
}

function getTypes() {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "select *  from type";
    $exec = $mysqli->query($query);
    $resultado = $exec->fetch_all();
    foreach ($resultado as $key => $value) {
        echo '<option value="'.$value[0].'">'.$value[0].' - '.$value[1].'</option>';
    }
    echo '<option value="newType" >Añadir Nuevo Tipo</option>';
    $mysqli->close();
}

function createUser($userName, $password, $idRole) {
    $mysqli = new mysqli("localhost", "root", "", "inventario");
    $query = "insert into user values ('".$userName."', '".$password."', '".$idRole."')";
    if(!$mysqli->query($query)){
        echo '{ "message": "Hubo un problema al momento de crear el usuario, INFO:"'.$mysqli->error.' }';
    }else{
        echo '{ "message": "El usuario a sido creado con exito", "nextStep" : "http://localhost/inventario/newUser.php"}';        
    }
    $mysqli->close();
}

?>