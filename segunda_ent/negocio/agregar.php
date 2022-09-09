<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Agregar</title>
</head>

<body>
    <form name="formulario" method="post" action="">

        <br> <input placeholder="Nombre" type="text" name="nom" maxlength="30" size="40"> <br>

        <br> <input placeholder="Apellido" type="text" name="ape" maxlength="30" size="40"> <br>

        <br> <input placeholder="Email" type="email" name="mail" maxlength="30" size="40"> <br>

        <br> <input placeholder="Contraseña" type="password" name="pass" maxlength="30" size="40"> <br>

        <br> <select name="rol" onchange="" id="elemento"> <br>
            <br>
            <option value="0">Selecciona un Rol</option> <br>
            <option value="1">Vendedor</option>
            <option value="2">Comprador </option>

        </select>
        <br>
        <br> <input type="submit" value="Agregar Usuario" name="agregar"> <br>

    </form>

    <?php
    require_once("miapp.php");
    if (isset($_POST['agregar'])) {

        if (isset($_POST['nom'])  && isset($_POST['ape']) && isset($_POST['mail'])  && isset($_POST['pass'])) {

            $patron = '/[1-9]/';

            if (preg_match("$patron", ($_POST['nom']))) {
                echo "<p style='color:red;'>Solo letras en el nombre </p>";
                header('refresh: 1; ');
            }
            if (preg_match("$patron", ($_POST['ape']))) {
                echo "<p style='color:red;'>Solo letras en el apellido </p>";
                header('refresh: 1; ');
            }

            if (empty($_POST['nom'])) {
                echo "<p style='color:red;'>Es necesario agregar un nombre </p>";
                header('refresh: 1; ');
            }
            if (empty($_POST['ape'])) {
                echo "<p style='color:red;'>Es necesario agregar un apellido </p>";
                header('refresh: 1; ');
            }
            if (empty($_POST['mail'])) {
                echo "<p style='color:red;'>Es necesario agregar un  email </p>";
                header('refresh: 1; ');
            }
            if (empty($_POST['pass'])) {
                echo "<p style='color:red;'>Es necesario agregar una contraseña </p>";
                header('refresh: 1; ');
            }
            if (($_POST['rol']) == "0") {
                echo "<p style='color:red;'>Es necesario agregar un rol </p>";
                header('refresh: 1; ');
            } else {


                if (empty($_POST['nom']) || empty($_POST['ape']) || empty($_POST['mail']) || empty($_POST['pass'])) {

                    return;
                }


                $nombre = $_POST['nom'];
                $apellido = $_POST['ape'];
                $email = $_POST['mail'];
                $password = $_POST['pass'];
                $rango = $_POST['rol'];

                if (existe($email) == true) {
                    echo "<p style='color:red;'>Email ya existente, ingrese otro email</p>";
                } else {
                    if (($_POST['rol']) == "1") {
                        if (agregar_vendedor($nombre, $apellido, $email, $password)  == true) {
                            echo "<p style='color:green;'>Se ha registrado correctamente</p>";
                            header('refresh: 1; url=../dise/accion.php');
                        }
                    } else if (($_POST['rol']) == "2") {
                        if (agregar_comprador($nombre, $apellido, $email, $password)  == true) {
                            echo "<p style='color:green;'>Se ha registrado correctamente</p>";
                            header('refresh: 1; url=../dise/accion.php');
                        }
                    }
                }
            }
        }
    }
    ?>
    <br> <a href="../dise/accion.php">Regresar</a> <br>
</body>

</html