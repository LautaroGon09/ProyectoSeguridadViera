<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Eliminar</title>
</head>

<body>
    <form name="formulario" method="post" action="">

        <input placeholder="Ingrese Email" type="email" name="mail" maxlength="30" size="40">

        <input type="submit" value="Buscar Usuario" name="buscar">

    </form>

    <?php
    ob_start();
    require_once("../dato/conexion.php");
    require_once("miapp.php");

    $consulta = mysqli_query($con, "SELECT * FROM usuario") or die(mysqli_error($con));

    ?>

    <table width="40%" border="1">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Email</td>
            <td>Accion</td>
        </tr>
        <?php

        while ($filas = mysqli_fetch_array($consulta)) {
            $IDu = $filas['IdUsuario'];
            $nom = $filas['Nombre'];
            $ape = $filas['Apellido'];
            $email = $filas['Email'];

            if (isset($_POST['buscar'])) {
                if (isset($_POST['mail'])) {
                    if (empty($_POST['mail'])) {
                        echo "<p style='color:red;'>Es necesario agregar un  email </p>";
                    }
                    if (empty($_POST['mail'])) {

                        return;
                    }

                    $email = $_POST['mail'];

                    if (buscar_datos($email) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDu = $filas['IdUsuario'];
                            $nom = $filas['Nombre'];
                            $ape = $filas['Apellido'];
                            $email = $filas['Email'];
                        }
                    } else {
                        $email = null;
                        echo "<p style='color:red;'>El usuario ingresado no existe </p>";
                        die;
                    }
                }
            }
        ?>
            <tr>
                <td><?php echo "<p style='color:black;'>" . $IDu . "</p>"; ?></td>
                <td><?php echo "<p style='color:black;'>" . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='color:black;'>" . $ape . "</p>"; ?></td>
                <td><?php echo "<p style='color:black;'>" . $email . "</p>"; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="submit" value="Eliminar" name="eliminar" />
                    </form>
                </td>
            </tr>
        <?php


        }


        if (isset($_POST['eliminar']))
                echo "anashe";
             else {
                echo "f";
            
        }


        ?>
    </table>
    <br />
    <a href="accion.php">Regresar</a>

    <head>
        <meta charset="UTF-8">

        <title>eliminar </title>
    </head>
</body>

</html>