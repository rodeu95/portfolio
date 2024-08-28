<?php
include "validarSesion.php";

$ubicacion = "../img/" . $nickname . "/perfil.jpg";

$archivo = $_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, $ubicaion)){
    echo "El archivo ha sido subido";
    header('Location: ../perfil.php');
}
else{
    echo "Ha ocurrido un error, intente de nuevo.";
    echo "<a href='../perfil.php'>Volver</a></div>";
}
