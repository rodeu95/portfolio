<?php

if($nickname == $nicknameA){
    header('Location: mi perfil.php');
}

$consulta = "SELECT *
            FROM persona
            WHERE nickname = '$nicknameA'";

$consulta = mysqli_query($conexion, $consulta);
$consulta = mysqli_fetch_array($consulta);

$nombreA = $consulta['nombre'];
$apellidosA = $consulta['apellidos'];
$edadA = $consulta['edad'];
$descripcionA = $consulta['descripcion'];
$fotoPerfilA = $consulta['fotoPerfil'];

