<?php
ob_start();
require_once("../dato/conexion.php");
require_once("miapp.php");
$ID = $_GET["ID"];

$consultas = mysqli_query($con, "SELECT * FROM usuario WHERE IdUsuario='" . $ID . "'") or die(mysqli_error($con));

while ($filax = mysqli_fetch_array($consultas)) {
    $nom = $filax['Nombre'];
    $ape = $filax['Apellido'];
    $pass = $filax['Contraseña'];
    $mail = $filax['Email'];
}
if (isset($_POST['modificar'])) {

    if (isset($_POST['nom2'])  && isset($_POST['ape2']) && isset($_POST['mail2'])  && isset($_POST['pass'])) {

        $patron = '/[1-9]/';

        if (preg_match("$patron", ($_POST['nom2']))) {
            echo "<p style='color:red;'>Solo letras en el nombre </p>";
            header('refresh: 2; ');
        }
        if (preg_match("$patron", ($_POST['ape2']))) {
            echo "<p style='color:red;'>Solo letras en el apellido </p>";
            header('refresh: 2; ');
        }

        if (empty($_POST['nom2'])) {
            echo "<p style='color:red;'>Es necesario agregar un nombre </p>";
            header('refresh: 2; ');
        }
        if (empty($_POST['ape2'])) {
            echo "<p style='color:red;'>Es necesario agregar un apellido </p>";
            header('refresh: 2; ');
        }
        if (empty($_POST['mail2'])) {
            echo "<p style='color:red;'>Es necesario agregar un  email </p>";
            header('refresh: 2; ');
        }
        if (empty($_POST['pass'])) {
            echo "<p style='color:red;'>Es necesario agregar una contraseña </p>";
            header('refresh: 2; ');
        }
        if (empty($_POST['nom2']) || empty($_POST['ape2']) || empty($_POST['mail2']) || empty($_POST['pass'])) {

            return;
        }


        $nom2 = $_POST['nom2'];
        $ape2 = $_POST['ape2'];
        $pass = $_POST['pass'];
        $mail2 = $_POST['mail2'];
        if (existe($mail2) == true) {
            echo "<p style='color:red;'>Email ya existente, ingrese otro email</p>";
            header('refresh: 2; ');

        } else if (actualizar($nom2, $ape2, $pass, $mail2, $ID)  == true) {
            echo "<p style='color:green;'>Se ha actualizado correctamente</p>";
            header('refresh: 1; url=../dise/accion.php');
        }
    }
}


?>

<form name="formulario" method="post" action="">

    <input placeholder="" type="text" name="nom2" value="<?php echo $nom; ?>" maxlength="30" size="40">

    <input placeholder="" type="text" name="ape2" value="<?php echo $ape ?>" maxlength="30" size="40">

    <input placeholder="Ingrese nueva contraseña" value="" type="password" name="pass" maxlength="30" size="40">

    <input placeholder="" type="email" name="mail2" value="<?php echo $mail; ?>" maxlength="30" size="40">

    <input type="submit" value="Modificar" name="modificar">

</form>
<br />
<a href="modificar.php">Regresar</a>

<head>
    <meta charset="UTF-8">

    <title>Modificar usuario </title>
</head>
</body>

</html>