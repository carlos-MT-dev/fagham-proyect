<?php
function validarRol() {
  if (isset($_SESSION["user"]) && isset($_SESSION["pass"]) && isset($_SESSION["rol"])) {
    return $_SESSION["rol"];
  }
}
?>