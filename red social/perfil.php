<?php
    include "php/conexion.php";
    include "php/validarSesion.php";
    $nicknameA = $_GET['nickname'];
    include "php/datosAmigo.php"
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mi Perfil</title>
        <meta charset="UTF-8"/>
        <link href="red social.css" rel="stylesheet">
        <link rel="icon" href="icono.ico" type="image/x-icon">
    </head>
    <body>
        <header>
            <div id="logo">
                <img src="img/logo.png" alt="logo">
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

        <section id="perfil">
            <img src="<?php echo "$fotoPerfilA" ?>">
            <h1><?php echo "$nombreA $apellidosA" ?></h1>
            <p><?php echo "$descripcionA" ?></p>
        </section>

        <section id="recuadros-amigos">
            <h2>Mis Amigos</h2>

            
            <?php $consulta = "SELECT *
                                FROM persona p
                                WHERE p.nickname in(SELECT a.nickname2
                                                    FROM amistad a
                                                    WHERE a.nickname1='$nicknameA')
                                
                                limit 3";
                $datos = mysqli_query($conexion, $consulta);
                while($fila = mysqli_fetch_array($datos)){
            ?>                  
            <section class="recuadro">
                <img src="<?php echo $fila['fotoPerfil']?>" height="150" width="150">
                <h2><?php echo $fila['nombre'] . " " .$fila['apellidos'] ?></h2>
                <p class="parrafo">
                    <?php echo $fila['descripcion'] ?>
                </p><br>
                <a href=" <?php echo "perfil.php?nickname=".$fila['nickname'] ?> " class="boton">Ver Perfil</a><br><br>
            </section>
            <?php
                }
            ?>   
        </section>

        <section id="recuadros-fotos">
            <h2>Mis Fotos</h2>

            <?php
            $consulta = "SELECT *
                        FROM fotos f
                        WHERE f.nickname = '$nicknameA'
                        limit 3";
            $datos = mysqli_query($conexion, $consulta);
            while($fila=mysqli_fetch_array($datos)){
            ?>

            <form action="php/subirFoto.php" method="post" enctype="multipart/form-data">
                Añadir Imagen: <input name="archivo" id="archivoFotos" type="file" accept=".jpg, .jpeg, .png" required/>
                <input type="submit" name="subir" value="Subir"/>
            </form>

            <section class="recuadro">
                <img src="<?php echo $fila['nombreFoto'] ?>" height="200" width="280">
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