<?PHP
include "conexion.php";

session_start();
$_SESSION['login'] = false;

$nickname = $_POST["nickname"];
$password = $_POST["contraseña"];

$consulta = "SELECT *
            FROM persona
            WHERE nickname = '$nickname'";
$consulta = mysqli_query($conexion, $consulta);
$consulta = mysqli_fetch_array($consulta);

if($consulta){
    if(password_verify($password, $consulta['password'])){
        $_SESSION['login'] = true;
        $_SESSION['nickname'] = $consulta['nickname'];
        $_SESSION['nombre'] = $consulta['nombre'];
        $_SESSION['apellidos'] = $consulta['apellidos'];
        $_SESSION['edad'] = $consulta['edad'];
        $_SESSION['descripcion'] = $consulta['descripcion'];
        $_SESSION['fotoPerfil'] = $consulta['fotoPerfil'];

        header('Location: ../mi perfil.php');
    }

    else{
        echo "Contraseña incorrecta";
        echo "<br><a href='red social.html'>Intentalo de nuevo</a></div>";
    }
}
else{
    echo "<br>El usuario no existe";
    echo "<br><a href='red social.html'>Intentalo de nuevo</a></div>";
}

mysqli_close($conexion);