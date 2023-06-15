<?php
session_start();

function validarSesion() {
  if (!isset($_SESSION["user"]) && !isset($_SESSION["pass"])) {
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
  }
}
?>