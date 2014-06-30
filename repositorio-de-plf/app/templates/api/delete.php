<?php 

if(isset($_POST['Eliminar'])){
echo"insertando...";

	$insercion= "delete from indicador where pk_indicador = ' " .$_POST['Id']." ';";

	   $exe=mysql_query($insercion);
	   if(!$exe){
	   	echo "no se logró eliminar  vuelve a intentar ".mysql_error();
	   	echo "----------".$insercion;
	   }
	   
	   	echo "eliminacion exitosa";
	   		   	mysql_query($insercion);



 	//header("Location:".$config_ruta."categoria");
    	require("header.php");
    //}
 
}

?>

<h1>Eliminar Indicador</h1>
<form id="form1" name="form1" method="POST">
	<p>Id del indicador a eliminar:</p>
	<input type="text" class ="form-control" placeholder="Id" id="Id" name="Id">
	
	<h2>
	  <input type="submit" value="Eliminar" id="Eliminar" name="Eliminar" />
	</h2>
</form>
<p></p1>

