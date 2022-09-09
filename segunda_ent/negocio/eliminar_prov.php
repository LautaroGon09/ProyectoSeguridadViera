<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Eliminar Proveedor</title>
</head>

<body>
    <form name="formulario" method="post" action="">

        <input placeholder="Ingrese Email" type="email" name="mail" maxlength="30" size="40">

        <input type="submit" value="Buscar Proveedor" name="buscar">

    </form>

    <?php
    ob_start();
    require_once("../dato/conexion.php");
    require_once("miapp.php");

    $consulta = mysqli_query($con, "SELECT * FROM proveedor") or die(mysqli_error($con));

    ?>

    <table width="40%" border="1">
        <tr>
            <td>Id</td>
            <td>Email</td>
            <td>Direccion</td>
            <td>Accion</td>
        </tr>
        <?php

        while ($filas = mysqli_fetch_array($consulta)) {
            $IDe = $filas['IdEmpresa'];
            $email = $filas['Email'];
            $direccion = $filas['Direccion'];

            if (isset($_POST['buscar'])) {
                if (isset($_POST['mail'])) {
                    if (empty($_POST['mail'])) {
                        echo "<p style='color:red;'>Es necesario agregar un  email </p>";
                    }
                    if (empty($_POST['mail'])) {

                        return;
                    }

                    $email = $_POST['mail'];

                    if (buscar_datos_prov($email) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM proveedor WHERE Email='" . $email . "'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDe = $filas['IdEmpresa'];
                            $email = $filas['Email'];
                            $direccion = $filas['Direccion'];
                        }
                    } else {
                        $email = null;
                        echo "<p style='color:red;'>El proveedor ingresado no existe </p>";
                        die;
                    }
                }
            }
        ?>
            <tr>
                <td><?php echo "<p style='color:black;'>" . $IDe . "</p>"; ?></td>
                <td><?php echo "<p style='color:black;'>" . $email . "</p>"; ?></td>
                <td><?php echo "<p style='color:black;'>" . $direccion . "</p>"; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="submit" value="Eliminar" name="eliminar" />
                    </form>
                </td>
            </tr>
        <?php


        }


        if (isset($_POST['eliminar']))
            if (eliminar_prov($email)  == true) {
                echo "<p style='color:green;'>Se ha eliminado correctamente</p>";
                header('refresh: 1; url=../dise/accion.php');
            }


        ?>
    </table>
    <br />
    <a href="../dise/accion.php">Regresar</a>

    <head>
        <meta charset="UTF-8">

    </head>
</body>

</html>