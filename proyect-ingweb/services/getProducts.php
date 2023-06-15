<?php

// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "ingweb");

// Verificar la conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta a la base de datos
$sql = "SELECT * FROM productos";
$resultado = mysqli_query($conn, $sql);

// Crear un array para almacenar los datos de los productos
$productos = array();

// Iterar sobre los resultados de la consulta y almacenar los datos en el array
while ($fila = mysqli_fetch_assoc($resultado)) {
  $productos[] = $fila;
}


// Convertir el array en formato JSON
echo json_encode($productos);

// Cerrar la conexión a la base de datos
mysqli_close($conn);

?>