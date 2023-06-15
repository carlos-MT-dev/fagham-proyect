<?php
include_once('../templates/cabecera.php');
?>


<?php
// seccion de la logica de php para hacer los envios de los datos a la base de datos

//llamamos a cada una de las entradas y las almacenamos en variables para un mejor manejo


//conexion a la base de datos con PDO

try {
$usuario="root";
$contraseña="";
$dsn="mysql:dbname=fagham;host=127.0.0.1";

$con =new PDO($dsn, $usuario,$contraseña);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//logica para asegurar la conexion
    if($con){
      //  echo "la conexion a fagham fue exitosa";
    }else{
       // echo "ocurrio algo en la conexion";
    }
} catch (Exception $ex) {
    echo "el error ocurrio en :".$ex->getMessage(); 
}


// Convertir el array en formato JSON
// echo json_encode($productos);


?>        



<div class="form-title">
    
    <h1>SECCION ADMINISTRATIVA</h1>
    <span> Mantenimiento de datos</span>
    <?php
    

$EntModelo = isset($_POST['txtModelo']) ? $_POST['txtModelo'] : 'err';
$EntMarca = isset($_POST['txtMarca']) ? $_POST['txtMarca'] : 'err';
$EntAño = isset($_POST['txtAño']) ? $_POST['txtAño'] : 'err';
$EntPrecio = isset($_POST['txtPrecio']) ? $_POST['txtPrecio'] : 'err';
$EntCategoria = isset($_POST['txtCategoria']) ? $_POST['txtCategoria'] : 'err';
$EntImagen = isset($_FILES['txtImagen']['name']) ? $_FILES['txtImagen']['name'] : 'err';

    //SWITCH PARA LA EVALUACION DE LOS EVENTOS DE LOS BOTONES DEL CRUD
    
    switch($_POST['accion']){
    
    case 'Agregar':
        try{
        $stmt= $con->prepare("INSERT INTO productos(modelo, marca, año, precio,categoria, imagen)VALUES(:modelo, :marca, :año, :precio, :categoria, :imagen)");
      
        $stmt->bindParam(':modelo',$EntModelo, PDO::PARAM_STR);
        $stmt->bindParam(':marca',$EntMarca, PDO::PARAM_STR);
        $stmt->bindParam(':año',$EntAño, PDO::PARAM_INT);
        $stmt->bindParam(':precio',$EntPrecio, PDO::PARAM_INT);
        $stmt->bindParam(':categoria',$EntCategoria, PDO::PARAM_STR);
        $stmt->bindParam(':imagen',$EntImagen, PDO::PARAM_STR);
        $stmt->execute();

        }catch(Exception $e){
            echo $e->getMessage();

        }
    
    
      ;break;
    case 'Modificar':
        // $stmt= $con->prepare("");
        ;break;
    case 'Cancelar':
        // $stmt= $con->prepare("");
        ;break;
    
    }
    ?>
</div>    

<!-- formulario para poder agregar los datos -->
<div class="col-md-5">


    <div class="card">
     
        <div class="card-body">
            
            <form action="<?php echo $_SERVER["PHP_SELF"];?>"method="POST" enctype="multipart/form-data" class="formulario"> 
               
                    <p> <b>Ingresa los datos del Repuesto </b></p>
                
                <br>
                <br>
                <div class="form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" class="form-control" name="txtID" id="txtID" placeholder="escriba el Modelo">
                </div>    
                <br>
                <div class="form-group">
                    <label for="txtModelo">Modelo:</label>
                    <input type="text" class="form-control" name="txtModelo" id="txtModelo" placeholder="escriba el Modelo">
                </div>    
                <br>
                <div class="form-group">
                    <label for="txtMarca">Marca:</label>
                    <input type="text" class="form-control" name="txtMarca" id="txtMarca"
                        placeholder="Escriba la marca">
                </div>        
                <br>
                <div class="form-group">
                    <label for="txtAño">Año:</label>
                    <input type="text" class="form-control" name="txtAño" id="txtAño"
                        placeholder="escriba el año">
                </div>        
                <br>
                <div class="form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input type="text" class="form-control" name="txtPrecio" id="txtPrecio"
                        placeholder="escriba el precio">
                </div>        
                <br>
                <div class="form-group">
                    <label for="txtCategoria">Categoria</label>
                    <input type="text" class="form-control" name="txtCategoria" id="txtCategoria"
                        placeholder="escriba la categoria">
                </div>        
                 <br>

                <div class="form-group">
                    <label for="txtCategoria">Imagen</label>
                    <br>
                    <input type="file" class="form-control" name="txtImagen" id=""
                        placeholder="Suba su imagen">
                </div>        
                <br><br>
                <!-- area de botones -->


                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btnAgre">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btnMod">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btnCanc">Cancelar</button>
                </div>        

            </form>
        </div>    

    </div>    

</div>    


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

                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td> <?php echo "";?></td>
                    <td><?php echo $EntModelo?></td>        
                    <td><?php echo $EntMarca?></td>
                    <td><?php echo $EntAño?></td>
                    <td><?php echo $EntPrecio?></td>
                    <td><?php echo $EntCategoria?></td>
                    <td><?php echo $EntImagen?></td>
                </tr>
            </tbody>
        </table>    
   

        

<?php
include_once('../templates/pie.php');
?>