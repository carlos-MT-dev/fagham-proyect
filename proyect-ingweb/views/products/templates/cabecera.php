<?php
include '../../controlers/validateLogin.php';
validarSesion();

include '../../controlers/validateRol.php';
$rol = validarRol();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="../../style/products.css">
    <title>Fagham</title>
</head>

<body>
    <main>
        <nav class="nav-home">
            <i class="logo uil uil-car"></i>
            <ul class="ul-links">
                <li class="li-link">
                    <a href="../home.php">
                        <i class="uil uil-estate"></i>
                        <span>Home</span>
                    </a>
                </li>
                <?php
                if ($rol == 'cliente') {
                ?>
                    <li class="li-link">
                        <a href="">
                            <i class="uil uil-tag"></i>
                            <span>Products</span>
                        </a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="li-link">
                        <a href="">
                            <i class="uil uil-tag"></i>
                            <span>Logistic</span>
                        </a>
                    </li>
                <?php
                }
                ?>
                <li class="logout li-link">
                    <a href="../controlers/logout.php">
                        <i class="uil uil-signout"></i>
                        <span>Log out</span>
                    </a>
                </li>
            </ul>
        </nav>