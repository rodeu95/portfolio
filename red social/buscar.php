<?PHP
    include "php/conexion.php";
    include "php/validarSesion.php";
    $nickname = $_SESSION['nickname'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Red Social</title>
        <meta charset="UTF-8"/>
        <link href="red social.css" rel="stylesheet">
        <link rel="icon" href="icono.ico" type="image/x-icon">
    </head>
    <body>
        <header>
            <div id="logo">
                <img src="img/logo.png" alt="logo"></a>
            </div>
            <nav class="menu">
                <ul>
                    <li><a href="red social.html">Inicio</a></li>
                    <li><a href="mi perfil.php">Mi Perfil</a></li>
                    <li><a href="amigos.php">Amigos</a></li>
                    <li><a href="buscar.php">Buscar</a></li>
                    <li><a href="php/cerrarSesion.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </header>

        <form action="/buscar" method="get" class="buscar">
            <input type="search" name="buscar" placeholder="Buscar...">
            <button type="submit" class="boton">Buscar</button>
        </form>
        <section id="recuadros">
            <h2>Buscar Amigos</h2>

            <?php $consulta = "SELECT *
                                FROM persona p
                                WHERE p.nickname !='$nickname' and p.nickname not in(SELECT a.nickname2
                                                                                    FROM amistad a
                                                                                    WHERE a.nickname1='$nickname')";
                $datos = mysqli_query($conexion, $consulta);
                while($fila = mysqli_fetch_array($datos)){
            ?>
            
            <section class="recuadro">
                <img src="<?php echo $fila['fotoPerfil']?>" height="150" width="150">
                <h2><?php echo $fila['nombre'] . " " .$fila['apellidos'] ?></h2>
                <p class="parrafo">
                    <?php echo $fila['descripcion'] ?>
                </p><br>
                <a href=" <?php echo "perfil.php?nickname=".$fila['nickname'] ?> " class="boton">Ver Perfil</a>
                <a href = "<?php echo "php/agregarAmigo.php?nickname=".$fila['nickname'] ?>" class="boton">Agregar</a><br><br>
            </section>
            <?php
                }
            ?>
            
        </section>
        <footer>
            <p>Copyright &copy; 2024, Rocío de Ugarriza</p>
        </footer>
    </body>
</html>