<form action="POST">
¡debes ingresar el id, y despues presionar <br> el boton de modificar, para poder mostrarte <br> los campos!
<input type="submit" value="Aceptar" name="btn_acept" class="btn-warning">

</form>

<?php
$btnwarning=(isset($_POST['btn_acept']))?$_POST['btn_acept']:"";

if(isset($btnwarning)){

    header("Location:mantenimiento.php");
}

?>