<?php 

if(isset($_POST['Agregar'])){
echo"insertando...";

	$insercion= "update indicador set pk_Indicador ='".$_POST['cat']."' , Descripcion_indicador ='".$_POST['des']." ' where pk_Indicador = '".$_POST['Nuevo']."';";

	   $exe=mysql_query($insercion);
	   if(!$exe){
	   	echo "no se logró insertar vuelve a intentar ".mysql_error();
	   	echo "-------".$insercion;
	   }
	   
	   	echo "insercion exitosa";
	   		   	mysql_query($insercion);



 	//header("Location:".$config_ruta."categoria");
    	require("header.php");
    //}
 
}

?>

<h1>Agregar categoria</h1>
<form id="form1" name="form1" method="POST">
	<p>Id que quieres actualizar:</p>
	<input type="text" class ="form-control" placeholder="Id" id="Nuevo" name="Nuevo">
	<p>Datos nuevos:</p>

	<p></p>
	<input type="text" class ="form-control" placeholder="Id_Indicador" id="cat" name="cat">
	<input type="text" class ="form-control" placeholder="Descripcio" id="des" name="des">

	<h2>
	  <input type="submit" value="Agregar" id="Agregar" name="Agregar" />
	</h2>
</form>
<p></p1>

