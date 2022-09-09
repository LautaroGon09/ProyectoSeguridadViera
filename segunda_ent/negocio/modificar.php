<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Modificar</title>
</head>

<body>
    <form name="formulario" method="post" action="">

        <input placeholder="Email" type="email" name="mail" maxlength="30" size="40">

        <input type="submit" value="Buscar Usuario" name="buscar">

    </form>
    <table width="40%" border="1">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Email</td>
            <td>Accion</td>
        </tr>
        <?php
        $IDu = null;
        $nom = null;
        $ape = null;
        $mail = null;

        require_once("../dato/conexion.php");
        require_once("miapp.php");

        if (isset($_POST['buscar'])) {
            if (isset($_POST['mail'])) {

                $email = $_POST['mail'];

                if (buscar_datos($email) == true) {
                    $consulta = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));

                    while ($filas = mysqli_fetch_array($consulta)) {
                        $IDu = $filas['IdUsuario'];
                        $nom = $filas['Nombre'];
                        $ape = $filas['Apellido'];
                        $mail = $filas['Email'];
                    }
                } else {
                    echo "<p style='color:red;'>El usuario ingresado no existe </p>";
                }
            }
        }
        ?>
        <tr>
            <td><?php echo "<p style='color:black;'>" . $IDu . "</p>"; ?></td>
            <td><?php echo "<p style='color:black;'>" . $nom . "</p>"; ?></td>
            <td><?php echo "<p style='color:black;'>" . $ape . "</p>"; ?></td>
            <td><?php echo "<p style='color:black;'>" . $mail . "</p>"; ?></td>
            <td><a href="modificar_usuario.php?ID=<?php echo $IDu; ?>">Modificar </a></td>
        </tr>

        <br>
        <a href="accion.php">Regresar</a> <br>
</body>
</html>