<?php 
if(isset($_POST['Agregar'])){
echo"insertando...";

	$insercion= "insert into nota_indicador(id_nota,fk_Indicador,nota) 
	VALUES ('".$_POST['nota']."', '".$_POST['indicador']."','".$_POST['texto']."');";

	   $exe=mysql_query($insercion);
	   if(!$exe){
	   	echo "no se logró insertar vuelve a intentar ".mysql_error();
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
	<p>Nombre de la nueva categoria:</p>

	<input type="text" class ="form-control" placeholder="Nota" id="nota" name="nota">
	<input type="text" class ="form-control" placeholder="Indicador" id="indicador" name="indicador">
	<input type="text" class ="form-control" placeholder="texto" id="texto" name="texto">

	<h2>
	  <input type="submit" value="Agregar" id="Agregar" name="Agregar" />
	</h2>
</form>
<p></p1>
