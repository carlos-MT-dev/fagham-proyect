<!-- hacemos el llamado a la conexion con la base de datos -->
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
  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="catalogo_manager.css">



</head>
<body>
<div class="princ-title">

    <h1>ENCUENTRA LO QUE BUSCAS AQUI</h1>
    <span>Seccion de Productos (catalogos)</span>
</div>    

   

<div class="container">


    <div class="card">

        <img class="card-img-top" src="brand-stp.png" alt="Title">

        <div class="card-body">
            <h4 class="card-title"></h4>
            <a name="" id="" class="btn btn-primary" href="http://goalkicker.com" role="button">Ver mas</a>
        </div>

    </div>

  
    
     <!-- <div class="card">

        <img class="card-img-top" src="brand-stp.png" alt="Title">

        <div class="card-body">
            <h4 class="card-title"></h4>
            <a name="" id="" class="btn btn-primary" href="http://goalkicker.com" role="button">Ver mas</a>
        </div>

    </div>
     <div class="card">

        <img class="card-img-top" src="brand-stp.png" alt="Title">

        <div class="card-body">
            <h4 class="card-title"></h4>
            <a name="" id="" class="btn btn-primary" href="http://goalkicker.com" role="button">Ver mas</a>
        </div>

    </div>

      <div class="card">

        <img class="card-img-top" src="brand-stp.png" alt="Title">

        <div class="card-body">
            <h4 class="card-title"></h4>
            <a name="" id="" class="btn btn-primary" href="http://goalkicker.com" role="button">Ver mas</a>
        </div>

    </div>
    <div class="card">

        <img class="card-img-top" src="brand-stp.png" alt="Title">

        <div class="card-body">
            <h4 class="card-title"></h4>
            <a name="" id="" class="btn btn-primary" href="http://goalkicker.com" role="button">Ver mas</a>
        </div>

    </div>
    <div class="card">

        <img class="card-img-top" src="brand-stp.png" alt="Title">

        <div class="card-body">
            <h4 class="card-title"></h4>
            <a name="" id="" class="btn btn-primary" href="http://goalkicker.com" role="button">Ver mas</a>
        </div>

    </div> -->

</div>


</body>
</html>


<?php
//funciones para las consultas sql

function callAll(){
$sql="SELECT * FROM productos";
$conexion=$GLOBALS['$con'];
$consult=$conexion->prepare(); 

}

?>