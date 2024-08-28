<?PHP
include "conexion.php";

session_start();
$login = $_SESSION['login'];

if(!$login){
    header('Location: red social.html');
}
else{
    $nickname = $_SESSION['nickname'];
}