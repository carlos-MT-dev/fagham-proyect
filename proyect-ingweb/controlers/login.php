<?php
session_start(); //inicio de la sesion 

// haciendo la conexion a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "fagham";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
  die("Error de conexión: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM usuarios WHERE user = '$username' AND pass = '$password'" ;
  $result = mysqli_query($conn, $sql);// raliza la consulta a la base de datos
  $row = mysqli_fetch_assoc($result);//devuelve un array con los resultados asociados a cada una de las columnas
  $count = mysqli_num_rows($result);//devuelve el numero de filas
  if ($count == 1) {
    $_SESSION["id"] = $row["id"];
    $_SESSION["user"] = $row["user"];
    $_SESSION["pass"] = $row["pass"];
    $_SESSION["rol"] = $row["rol"];
    $_SESSION["category"] = $row["category"];
    header("location: ../views/main.php");
  } else {
    $_SESSION["error"] = "Nombre de usuario o contraseña incorrectos";
    header("location: ../index.php");
  }
}
?>