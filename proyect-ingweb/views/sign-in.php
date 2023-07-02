<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--apartado para el css  -->
    <link rel="stylesheet" href="../style/sign-in.css">

    <title>Registrate!</title>
</head>
<body>
    
   <h1>Registrate y se parte de nosotros</h1>

   <!-- apartado de formulario de registro -->

   <form action="$_SERVER['PHP_SELF']" method="post">
     <label for="nom_sig">Nombre: </label> 
     <input type="text" name="nom_sig" id="" placeholder="Ingrese su nombre"><br>
     <label for="ape_sig">Apellido: </label>
     <input type="text" name="ape_sig" id="" placeholder="Ingrese su Apellido"><br>
     <label for="ema_sig">Email: </label>
     <input type="email" name="ema_sig" id="" placeholder="Ingrese su correo @"><br>

     <!-- apartado para elegir marcas de preferencias -->
     <label for="marc_sig">Marca de tu preferencia</label> 
     <select name="marc_sig" id="marc_sig">
       <option value="Frenosa">Frenosa</option>
       <option value="Incolbest">Incolbest</option>
       <option value="Todofrenos">Todofrenos</option>
       <option value="STP">STP</option>
     </select>
     <br>
     <br>
     <!-- apartado para los productos que se compran con mas frecuencia -->
     <label for="area_sig">Cuales son los productos que compras con frecuencia:</label>
     <br>
     <textarea name="area_sig" id="" cols="30" rows="10"  placeholder="Escribe los productos que compras con mas frecuencia y separalos por una coma"></textarea>




   </form>






</body>
</html>