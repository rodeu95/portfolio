<?PHP
include "conexion.php";

$nickname = $_POST["nickname"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellido"];
$edad = $_POST["edad"];
$descripcion = $_POST["descripcion"];
$email = $_POST["correo"];
$password = $_POST["contraseña"];

$passwordHash = password_hash($password, PASSWORD_BCRYPT);
$fotoPerfil = "img/$nickname/perfil.jpg";

$consultaId = "SELECT nickname
               FROM persona
               WHERE nickname = '$nickname' ";
$consultaId = mysqli_query($conexion, $consultaId);
$consultaId = mysqli_fetch_array($consultaId);

if(!$consultaId){
    $sql = "INSERT INTO persona VALUES ('$nickname', '$nombre', '$apellidos', '$edad', '$descripcion', '$fotoPerfil', '$email', '$passwordHash')";
    if(mysqli_query($conexion, $sql)){
        mkdir("../img/$nickname");
        copy("../img/unnamed.jpg", "../img/$nickname/perfil.jpg");

        echo "<br>Tu cuenta ha sido creada";
        echo "<br><a href ='../red social.html'>Iniciar Sesión</a></div>";
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

}
else{
    echo "El nickname ya existe";
    echo "<a href='red social.html'>Intentalo de nuevo</a></div> ";
}

mysqli_close($conexion);