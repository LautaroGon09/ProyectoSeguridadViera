<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Agregar</title>
</head>

<body>
    <form name="formulario" method="post" action="">

        <br> <input placeholder="Email" type="email" name="mail" maxlength="30" size="40"> <br>

        <br> <input placeholder="Direccion" type="text" name="dir" maxlength="30" size="40"> <br>

        <br>
        <br> <input type="submit" value="Agregar Proveedor" name="agregar"> <br>

    </form>

    <?php
    require_once("miapp.php");
    if (isset($_POST['agregar'])) {

        if (isset($_POST['mail'])  && isset($_POST['dir'])) {


            if (empty($_POST['mail'])) {
                echo "<p style='color:red;'>Es necesario agregar un  email </p>";
                header('refresh: 1; ');
            }
            if (empty($_POST['dir'])) {
                echo "<p style='color:red;'>Es necesario agregar una direccion </p>";
                header('refresh: 1; ');
            }



            if (empty($_POST['mail']) || empty($_POST['dir'])) {

                return;
            }

            $email = $_POST['mail'];
            $direccion = $_POST['dir'];

            if (existe_prov($email) == true) {
                echo "<p style='color:red;'>Email ya existente, ingrese otro email</p>";
            } else {
                if (agregar_prov($email, $direccion)  == true) {
                    echo "<p style='color:green;'>Se ha registrado correctamente</p>";
                    header('refresh: 1; url=../dise/accion.php');
                }
            }
        }
    }
    ?>
    <br> <a href="../dise/accion.php">Regresar</a> <br>
</body>

</html