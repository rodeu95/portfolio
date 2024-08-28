<?PHP
session_start();
$_SESSION = [];

session_destroy();
header('Location: ../red social.html');