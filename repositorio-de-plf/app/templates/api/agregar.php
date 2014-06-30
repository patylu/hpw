<?php 
	
    //if(isset($_SESSION['user'])==FALSE){
    //	header("Location:").$config_ruta;
if(isset($_POST['Agregar'])){
echo"insertando...";

	$insercion= "insert into indicador(pk_indicador,Descripcion_indicador) 
	VALUES ('".$_POST['cat']."', '".$_POST['des']."');";

	   $exe=pg_query($insercion);
	   if(!$exe){
	   	echo "no se logró insertar vuelve a intentar ".mysql_error();
	   }
	   
	   	echo "insercion exitosa";
	   		   	pg_query($insercion);


    //}
 
}

?>

<h1>Agregar categoria</h1>
<form id="form1" name="form1" action="indicador" method="POST">
	<p>Nombre de la nueva categoria:</p>
	<input type="text" class ="form-control" placeholder="Indicador" id="cat" name="cat">
	<input type="text" class ="form-control" placeholder="Descripcio" id="des" name="des">

	<h2>
	  <input type="submit" value="Agregar" id="Agregar" name="Agregar" />
	</h2>
</form>
<p></p1>
