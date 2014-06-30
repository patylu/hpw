<?xml version="1.0" encoding="UTF-8"?>
<catalog>
<?php foreach ($censos as $b) { ?>
  <censo id="<?php echo $b['pk_indicador']; ?>">
    <entidades>
		<entidad>
		<?php echo $b['nombre_entidad']; ?>
		</entidad>
    </entidades>
    <municipios>
		<municipio>
		<?php echo $b['nombre_municipio']; ?>
		</municipio>
    </municipios>
    <descripcion_indicador>
		<?php echo $b['descripcion_indicador']; ?>
	</descripcion_indicador>
    <tema1><?php echo $b['tema1']; ?></tema1>
    <tema2><?php echo $b['tema2']; ?></tema2>
    <tema3><?php echo $b['tema3']; ?></tema3>
    <nota><?php echo $b['nota']; ?></nota>
    <anio><?php echo $b['anio2010']; ?></anio>
  </censo>
<?php } ?>
</catalog>
