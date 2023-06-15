<?php	
 include '../controlers/validateLogin.php';
 validarSesion();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bienvenida</title>
</head>
<body>
 <?php	
   header("location: ./home.php");  
  ?>
</body>
</html>