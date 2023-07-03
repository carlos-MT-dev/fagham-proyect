<?php 
    
    try{
    $servername = "localhost";
    $username = "root";
    $password = "";
        
    $con = new PDO("mysql:host=$servername;dbname=fagham", $username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // condicionales para los errores de conexion
    if($con){
    //   echo "la conexion fue exitosa";
    }else{
        echo "ocurrio algo en la conexion";
    }
    
    }catch(PDOException $ex){
    
      echo "El error ocurre en :".$ex->getMessage(); 
    }

    ?>