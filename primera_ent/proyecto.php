<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>proyecto</title>
</head>

<body>

    <form action="proyecto.php" method="post"><br>

        <label> Ingrese usuario

            <input type="text" name="user">

        </label>


        <label> Ingrese contraseña

            <input type="password" name="pass">

        </label>

        <label>

            <input type="submit" name="Aceptar">

        </label>

        <br>
        <br>

        <?php
        require_once("validacion.php");

        if (isset($_POST["Aceptar"])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            if (empty($_POST["pass"])) {
                print "Es necesario agregar una contraseña " . "<br>";
            }

            if (validaRequerido($user) == true) {


                $tipo = existe_user($user, $pass);
                echo $tipo;
                echo $user;
                echo $pass;
                if ($tipo == "J") {
                    header("Location: pagina_jefe.php");
                }
              elseif ($tipo == "V") {
                    header("Location: pagina_vendedor.php");
                }
             elseif ($tipo == "C") {
                    header("Location: pagina_comprador.php");
                }
             else  {
                    header("Location: pagina_cliente.php");
                }
            } else {
                print  "Es necesario agregar un usuario " . "<br>";
            }
        }
        function validaRequerido($user)
        {
            if (trim($user) == '') {
                return false;
            } else {
                return true;
            }
        }

        ?>

</body>

</html>