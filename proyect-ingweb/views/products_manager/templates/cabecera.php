<?php
// validadacion del login de acceso si existen los dos parametros, de lo ocntrarkio la sesion se destruye
include '../../../controlers/validateLogin.php';
validarSesion();
// validacion del rol, deben existir los campos para que se ejecute
include '../../../controlers/validateRol.php';
$rol = validarRol();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="products_manager.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">



  <title> Mantenimiento de Datos</title>
</head>


 



<body>

