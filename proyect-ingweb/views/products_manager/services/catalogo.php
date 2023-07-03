<!-- hacemos el llamado a la conexion con la base de datos -->
<?php

try {
    $servername = "localhost";
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=$servername;dbname=fagham", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // condicionales para los errores de conexion
    if ($con) {
        //   echo "la conexion fue exitosa";
    } else {
        echo "ocurrio algo en la conexion";
    }

} catch (PDOException $ex) {

    echo "El error ocurre en :" . $ex->getMessage();
}

?>
<!-- consulta a la base de datos a cerca de la informacion-->
<!-- uso de switch para cada uno de los eventos -->
<?php



?>

<!-- cuerpo del catalogo -->

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

        <!-- llamada automatica a todos los valores indexados en la tabla productos -->

        <?php
        //  consulta de todos los valores
        $call = $con->prepare("SELECT*FROM productos");
        $call->execute();
        //  asociamos el resultado a sus cabeceras idexadas
        $resIt = $call->fetchAll(PDO::FETCH_ASSOC);
        ?>


        <!-- inicio del bucle para traer toda la informacion -->

        <?php foreach ($resIt as $e) { ?>
            <div class="card">

                <img class="card-img-top" src="<?php echo "../assets/".$e['imagen'] ?>" alt="<?php echo "el nombre de la imagen es:".$e['imagen'];?>">

                <section class="especify-card">
                  <h4>Modelo: <?php echo $e['modelo']?></h4>
                  <h4>Marca: <?php echo $e['marca']?></h4>
                  <h4>Año: <?php echo $e['ano']?></h4>
                  <h4>Precio: <?php echo $e['precio']?></h4>
                </section>

                <div class="card-body">
                    <h4 class="card-title"></h4>
                </div>

            </div>
        <?php } ?>



    </div>


</body>

</html>