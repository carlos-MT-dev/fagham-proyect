<div class="form-title">
       <!-- navegador con las opciones  -->
  <nav class="navegador">

<!--imagen de la empresa en el navegador-->
<i class="logo uil uil-car"></i>
<!-- links del navegador con redireccion a otras pestañas -->
<ul class="ul-links">
    <!-- home -->
    <li class="li-link">
        <a href="../../home.php">
            <i class="uil uil-estate"></i>
            <span>Home</span>
        </a>
    </li>
    <!--link de productos  -->
    <li class="li-link">
        <a href="./products/products.php">
            <i class="uil uil-tag"></i>
            <span>Products</span>
        </a>
    </li>
    <!-- link hacia pagina de la logistica -->
    <li class="li-link">
        <a href="">
            <i class="uil uil-tag"></i>
            <span>Logistic</span>
        </a>
    </li>
    <!--links para la gestion de los adminitradores-->
    
     <!-- <li class="li-link">
       <a href="products_manager/services/mantenimiento.php">
         <i class="util util-tag"></i>
         <span>Mantenimiento</span>
       </a>
     </li> -->
    
     <!-- graficas utiles para el negocio, ventas -->
    
     <li class="li-link">
       <a href="estadisticas.php">
         <i class="util util-tag"></i>
         <span>Graficas</span>
       </a>
     </li>
    
     
    <!-- link para cerrar sesion -->
    <li class="logout li-link">
        <a href="../../../controlers/logout.php">
            <i class="uil uil-signout"></i>
            <span>Log out</span>
        </a>
    </li>
</ul>
</nav>
    <h1>SECCION ADMINISTRATIVA</h1>
    <span> Mantenimiento de datos Fhagam S.A.C</span>


    <?php
    include_once('../templates/cabecera.php');
    ?>


    <?php
    // seccion de la logica de php para hacer los envios de los datos a la base de datos
    
    //llamamos a cada una de las entradas y las almacenamos en variables para un mejor manejo
    

    //conexion a la base de datos con PDO
    
    try {
        $usuario = "root";
        $contraseña = "";
        $dsn = "mysql:dbname=fagham;host=127.0.0.1";

        $con = new PDO($dsn, $usuario, $contraseña);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //logica para asegurar la conexion
        if ($con) {
            // echo "la conexion a fagham fue exitosa" . "</br>";
        } else {
            echo "ocurrio algo en la conexion";
        }
    } catch (Exception $ex) {
        echo "el error ocurrio en :" . $ex->getMessage();
    }


    // Convertir el array en formato JSON
// echo json_encode($productos);
    

    ?>


    <?php

    $EntID = isset($_POST['txtID']) ? $_POST['txtID'] : '';
    $EntModelo = isset($_POST['txtModelo']) ? $_POST['txtModelo'] : '';
    $EntMarca = isset($_POST['txtMarca']) ? $_POST['txtMarca'] : '';
    $EntAno = isset($_POST['txtAño']) ? $_POST['txtAño'] : '';
    $EntPrecio = isset($_POST['txtPrecio']) ? $_POST['txtPrecio'] : '';
    $EntCategoria = isset($_POST['txtCategoria']) ? $_POST['txtCategoria'] : '';
    $EntImagen = isset($_FILES['txtImagen']['name']) ? $_FILES['txtImagen']['name'] : '';

    //agregando el valor de la accion de los botones
    $txtAccion = (isset($_POST['accion'])) ? $_POST['accion'] : 'no se esta enviando nada';

    //SWITCH PARA LA EVALUACION DE LOS EVENTOS DE LOS BOTONES DEL CRUD
    
        switch ($txtAccion) {

            case 'Agregar':

        
                // proceso de envio de datos a la base de datos
                $stmt = $con->prepare("INSERT INTO productos(modelo, marca, ano, precio,categoria, imagen)VALUES(:modelo, :marca, :ano, :precio, :categoria, :imagen)");

                $stmt->bindParam(':modelo', $EntModelo);
                $stmt->bindParam(':marca', $EntMarca);
                $stmt->bindParam(':ano', $EntAno);
                $stmt->bindParam(':precio', $EntPrecio);
                $stmt->bindParam(':categoria', $EntCategoria);
                $stmt->bindParam(':imagen', $EntImagen);
                $stmt->execute();
                
               
               
                break;
            case 'Modificar':
              
                //condicional para asegurar que se emita un comunicado de que deben rellenar el id antes de modificar

                if($EntID==""){

                    include_once('../templates/form-warning.php');
                }
                //procedimiento para modificar los campos
                $stmt = $con->prepare("UPDATE  productos SET modelo=:modelo, marca=:marca, ano=:ano, precio=:precio, categoria=:categoria, imagen=:imagen  WHERE  id=:id ");
                
                $stmt->bindParam(':id', $EntID);
                $stmt->bindParam(':modelo', $EntModelo);
                $stmt->bindParam(':marca', $EntMarca);
                $stmt->bindParam(':ano', $EntAno);
                $stmt->bindParam(':precio', $EntPrecio);
                $stmt->bindParam(':categoria', $EntCategoria);
                $stmt->bindParam(':imagen', $EntImagen);
                $stmt->execute();
                
                echo "se logro modificar los datos" ;
                
                break;
                case 'Cancelar':
                    header('Location:mantenimiento.php');
                    break;
                    
                case 'seleccionar':

                 //procedimiento apra consultar los campos por medio de sql
                 $sql= "SELECT * FROM  productos WHERE id= :id ";
                 $call=$con->prepare($sql);
                 $call->bindParam(':id', $EntID);
                 $call->execute();
                 //asociamos los resultados a sus respectivas cabeceras 
                 $resul=$call->fetch(PDO::FETCH_ASSOC);
                 //hacemos la asiganacion de los valores del resultado y los reemplazamos en los inputs
                 //(modelo, marca, ano, precio,categoria, imagen)
                 $EntID= $resul['id'];
                 $EntModelo=$resul['modelo'];
                 $EntMarca=$resul['marca'];
                 $EntAno=$resul['ano'];
                 $EntPrecio=$resul['precio'];
                 $EntCategoria=$resul['categoria'];
                 $EntImagen=$resul['imagen'];
                        
                      
                break;
            case 'borrar':
                 //eliminamos el objeto de la base de datos

                 $del= $con->prepare("DELETE FROM productos WHERE id= :id ");
                 $del->bindParam(":id",$EntID);
                 $del->execute();

                 //actualizando 

                 header("Location: mantenimiento.php");
 


                break;
           
        }
  

    ?>
</div>

<!-- formulario para poder agregar los datos -->
<div class="col-md-5">


    <div class="card">

        <div class="card-body">

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data"
                class="formulario">

                <p> <b>Ingresa los datos del Repuesto </b></p>

                <br>
                <br>

                <div class="form-group">
                    <label for="txtID">ID:</label>
                    <input value="<?php echo $EntID;?>" type="text" class="form-control" name="txtID" id="txtID" placeholder="escriba el Modelo"  type="text" >
                </div>
                <br>
                <div class="form-group">
                    <label for="txtModelo">Modelo:</label>
                    <input value="<?php echo $EntModelo;?>" type="text" class="form-control" name="txtModelo" id="txtModelo"
                        placeholder="escriba el Modelo">
                </div>
                <br>
                <div class="form-group">
                    <label for="txtMarca">Marca:</label>
                    <input value="<?php echo $EntMarca;?>" type="text" class="form-control" name="txtMarca" id="txtMarca"
                        placeholder="Escriba la marca">
                </div>
                <br>
                <div class="form-group">
                    <label for="txtAño">Año:</label>
                    <input value="<?php echo $EntAno; ?>" type="text" class="form-control" name="txtAño" id="txtAño" placeholder="escriba el año">
                </div>
                <br>
                <div class="form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input value="<?php echo $EntPrecio; ?>" type="text" class="form-control" name="txtPrecio" id="txtPrecio"
                        placeholder="escriba el precio">
                </div>
                <br>
                <div class="form-group">
                    <label for="txtCategoria">Categoria</label>
                    <input value="<?php echo $EntCategoria; ?>" type="text" class="form-control" name="txtCategoria" id="txtCategoria"
                        placeholder="escriba la categoria">
                </div>
                <br>

                <div class="form-group">
                    <label for="txtCategoria">Imagen: <br/> <?php echo $EntImagen?></label>
                    <br>
                    <input  type="file" class="form-control" name="txtImagen" id="" placeholder="Suba su imagen">
                </div>
                <br><br>
                <!-- area de botones -->


                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btnAgre" <?php ?>>Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btnMod" <?php ?>>Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btnCanc" <?php ?>>Cancelar</button>
                </div>

            </form>
        </div>

    </div>

</div>

<br>
<!-- tablas para mostrar los datos -->
<br><br><br>


<table class="table-bordered">
    <thead>
        <tr>
            <!-- el scope especifica que lo que esta dentro de la columna es la cabecera de la tabla -->
            <th scope="col">ID</th>
            <th scope="col">Modelo</th>
            <th scope="col">Marca</th>
            <th scope="col">Año</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Opciones de gestion</th>

        </tr>
    </thead>
    <tbody>

         <?php

         //vamos a llamar a todos los registros de la base de datos
         $call= $con->prepare("SELECT * FROM productos"); 
         $call->execute();
         //hacemos el relacionamiento de las cabeceras con los valores devueltos por la bd
         $resp=$call->fetchAll(PDO::FETCH_ASSOC)
         ?>     
         <!-- esta seccion se va a ver inmersa en un bucle para llamar datos -->
         <?php  foreach($resp as $k){?>
        <tr class="">

    
            <td>
                <?php echo $k['id']?>
            </td>
            <td>
                <?php echo  $k['modelo']?>
            </td>
            <td>
                <?php echo $k['marca'] ?>
            </td>
            <td>
                <?php echo $k['ano'] ?>
            </td>
            <td>
                <?php echo $k['precio'] ?>
            </td>
            <td>
                <?php echo $k['categoria'] ?>
            </td>
            <td>
                <?php echo $k['imagen'] ?>
            </td>
            <td>
                <form method="POST">

                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $k['id']?>">
                    <input type="submit" class="btn-select" value="seleccionar" name="accion">
                    <input type="submit" class="btn-errase" value="borrar" name="accion">
                
                </form>

            </td>
        </tr>

      <?php  }?>
    </tbody>
</table>




<?php


include_once('../templates/pie.php');
?>