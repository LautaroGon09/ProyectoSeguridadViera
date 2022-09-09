<?php

function login($email, $password)
{
    $con = mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $email . "'and Contraseña='" . $password . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
function existe($email)
{
    $con = mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
function existe_prov($email)
{
    $con = mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT IdEmpresa FROM proveedor WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
function buscar_datos($email)
{
    $con = mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
function buscar_datos_prov($email)
{
    $con = mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT * FROM proveedor WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}

function existe_cliente($email, $password)
{

    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "' and Contraseña='" . $password . "'");

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    $query = mysqli_query($con, "SELECT * FROM cliente WHERE IdUsuario=" . $row["IdUsuario"]);

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    mysqli_close($con);
    return true;
}
function existe_cliente2($email)
{

    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT * FROM USUARIO WHERE email='" . $email . "'");

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    $query = mysqli_query($con, "SELECT * FROM CLIENTE WHERE IdUsuario=" . $row["IdUsuario"]);

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    mysqli_close($con);
    return true;
}

function existe_vendedor($email, $password)
{

    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "' and Contraseña='" . $password . "'");

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    $query = mysqli_query($con, "SELECT * FROM vendedor WHERE IdUsuario=" . $row["IdUsuario"]);

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    mysqli_close($con);
    return true;
}
function existe_comprador($email, $password)
{

    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "' and Contraseña='" . $password . "'");

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    $query = mysqli_query($con, "SELECT * FROM comprador WHERE IdUsuario=" . $row["IdUsuario"]);

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    mysqli_close($con);
    return
        true;
}
function existe_jefe($email, $password)
{

    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "' and Contraseña='" . $password . "'");

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    $query = mysqli_query($con, "SELECT * FROM jefe WHERE IdUsuario=" . $row["IdUsuario"]);

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    mysqli_close($con);
    return true;
}

function reg_clin($nombre, $apellido, $email, $password)
{
    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    mysqli_query($con, "insert into usuario (Nombre, Apellido, Contraseña, Email) VALUES('$nombre', '$apellido','$password', '$email')") or die;
    mysqli_query($con, "insert into cliente values (" . mysqli_insert_id($con) . ")");
    (mysqli_error($con));

        mysqli_close($con);
    
    return true;
}


function agregar_vendedor($nombre, $apellido, $email, $password)
{
    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    mysqli_query($con, "insert into usuario (Nombre, Apellido, Contraseña, Email) VALUES('$nombre', '$apellido','$password', '$email')") or die;
    mysqli_query($con, "insert into vendedor values (" . mysqli_insert_id($con) . ")");
    (mysqli_error($con));
    mysqli_close($con);
    return true;
}

function agregar_comprador($nombre, $apellido, $email, $password)
{
    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    mysqli_query($con, "insert into usuario (Nombre, Apellido, Contraseña, Email) VALUES('$nombre', '$apellido','$password', '$email')") or die;
    mysqli_query($con, "insert into comprador values (" . mysqli_insert_id($con) . ")");
    (mysqli_error($con));
    mysqli_close($con);
    return true;
}
function agregar_prov($email, $direccion)
{
    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    mysqli_query($con, "insert into proveedor (Email, Direccion) VALUES( '$email', '$direccion')") or die;
    (mysqli_error($con));
    mysqli_close($con);
    return true;
}
function eliminar( $email)
{
    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    mysqli_query($con, "DELETE FROM usuario  WHERE Email='" . $email . "'") or die;
    (mysqli_error($con));
    mysqli_close($con);

    return true;
}
function eliminar_prov( $email)
{
    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");
    mysqli_query($con, "DELETE FROM proveedor  WHERE Email='" . $email . "'") or die;
    (mysqli_error($con));
    mysqli_close($con);

    return true;
}




function actualizar($nombre, $apellido, $password, $email,  $ID)
{
    $con =   mysqli_connect("localhost", "root", "Mateobarsa04", "shiftdevelops");

    mysqli_query($con, "UPDATE usuario SET Nombre = '$nombre',Apellido = '$apellido', Contraseña = '$password', Email = '$email'   
    WHERE IdUsuario = '$ID'") or die(mysqli_error($con));
    mysqli_close($con);
    return true;
}

