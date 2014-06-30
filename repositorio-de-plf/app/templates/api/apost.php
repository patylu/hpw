
<?php 

if(isset($_POST['Insertar'])){
	echo "insertando...";
	$insercion="insert into censo 
	(pk_censo,
		fk_entidad,fk_municipio,
		Tema1,
		Tema2,
		Tema3,
		fk_Indicador,
		anio2010)
	values(
		".(int)$_POST['Censo'].
		",'00',
		'000',
		'".$_POST['Tema1']."',
		'".$_POST['Tema2']."',
		'".$_POST['Tema3']."',
		'".$_POST['Indicador']."',
		'".$_POST['anio']."');";

$sen=mysql_query($insercion);

	if(!$sen){
		echo "No se pudo insertar   ".mysql_error();
	}
	echo "Insetdado con exito";
		mysql_query($insercion);


}

   // }   
?>

<h1>Agregar Censo  </h1>
<p>Inserta los datos del nuevo Censo</p>
<h2></h2>


<h2> </h2>
<form id ="form1" name="form1" method="POST">
<h2> </h2>
<p1>Datos:</p1>
<h2> </h2>

<p> Censo</p>
	<input type="text" class ="form-control" placeholder="Censo" id="Censo" name="Censo">
	<h></h>
	
		<p>Tema1</p>
	<h></h>

	<input type="text" class ="form-control" placeholder="Tema1" id="Tema1" name="Tema1">
	<h></h>
		<p>Tema2</p>
	<h></h>

	<input type="text" class ="form-control" placeholder="Tema2" id="Tema2" name="Tema2">
	<h></h>
		<p>Tema3</p>
	<h></h>

	<input type="text" class ="form-control" placeholder="Tema3" id="Tema3" name="Tema3">
	<h></h>
		<p>Indicador</p>
	<h></h>

	<input type="text" class ="form-control" placeholder="Indicador" id="Indicador" name="Indicador">
	<h></h>
		<p>anio</p>
	<h></h>
	<input type="text" class ="form-control" placeholder="anio" id="anio" name="anio">
	<h></h>
	
	<h3></h3>
<input type="submit"  value="Insertar" id="Insertar" name="Insertar"> 
<h3></h3>
</form>
