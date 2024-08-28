<?PHP
$servidor = "localhost";
$usuario = "root";
$contrasenha = "";
$BD = "redsocial";

$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $BD);

if(!$conexion){
    echo "Falló la conexión <br>";
    die("Connection failed: ". mysqli_connect_error() );
}
else{
    echo "Conexión exitosa";
}

