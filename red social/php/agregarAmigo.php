<?php
include "conexion.php";
include "validarSesion.php";

session_start();
$nickname = $_SESSION['nickname'];
$nicknameA = $_GET['nickname'];

// Verificar si el usuario existe en la tabla persona
$consultaVerificar = "SELECT nickname FROM persona WHERE nickname = '$nicknameA'";
$resultadoVerificar = mysqli_query($conexion, $consultaVerificar);

if (mysqli_num_rows($resultadoVerificar) > 0) {
    // Insertar en la tabla amistad (bidireccional)
    $consulta1 = "INSERT INTO amistad (nickname1, nickname2) VALUES ('$nickname', '$nicknameA')";
    $consulta2 = "INSERT INTO amistad (nickname1, nickname2) VALUES ('$nicknameA', '$nickname')";

    // Ejecutar ambas consultas
    if (mysqli_query($conexion, $consulta1) && mysqli_query($conexion, $consulta2)) {
        echo "Ahora tienes un nuevo amigo";
        header('Location: ../buscar.php');
    } else {
        echo "Error: " . mysqli_error($conexion);
        echo "<a href='../buscar.php'>Volver</a></div>";
    }
} else {
    echo "El usuario no existe.";
    echo "<a href='../buscar.php'>Volver</a></div>";
}


