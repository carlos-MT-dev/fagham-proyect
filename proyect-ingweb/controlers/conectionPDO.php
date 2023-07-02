<?php 
    
    try{
    $dsn="mysql:dbname=fagham;host=127.0.0.1 ";
    $usuario="root";
    $contra="";
    
    $con= new PDO($dsn, $usuario,$contra);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // condicionales para los errores de conexion
    if($con){
      echo "la conexion fue exitosa";
    }else{
        echo "ocurrio algo en la conexion";
    }
    
    }catch(Exception $ex){
    
      echo "El error ocurre en :".$ex->getMessage(); 
    }
    ?>