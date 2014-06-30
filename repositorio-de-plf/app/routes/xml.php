<?php

$app->get('/xml', function() use($app) {
  $app->response->headers->set('Content-Type', 'application/xml');
  $datos = array(
    'censos' => array(
    )
  );
  $censos = $app->db->query("select pk_indicador,nombre_entidad,nombre_municipio,descripcion_indicador,tema1,tema2,tema3,descripcion_indicador,nota,anio2010 from censo as c inner join entidad on pk_entidad = fk_entidad
inner join municipio on pk_municipio =fk_municipio
inner join indicador on pk_indicador = c.fk_indicador
left outer join nota_indicador as n on pk_indicador =n.fk_indicador
");
  foreach ($censos as $censo) {
    $datos['censos'][] = $censo;
  }
  $app->render('xml.php', $datos);
});


$app->get('/xml/:pk_indicador', function($usuarioID) use($app) {
 $app->response->headers->set('Content-Type', 'application/xml');

  $datos = array(
    'censos' => array(
    )
  );

            $censos = $app->db->prepare(" select pk_indicador,nombre_entidad,nombre_municipio,descripcion_indicador,tema1,tema2,tema3,descripcion_indicador,nota,anio2010 from censo as c inner join entidad on pk_entidad = fk_entidad
inner join municipio on pk_municipio =fk_municipio
inner join indicador on pk_indicador = c.fk_indicador
left outer join nota_indicador as n on pk_indicador  where pk_indicador=:param1");
            $censos->execute(array(':param1' => $usuarioID));
            $res = $censos->fetchAll(PDO::FETCH_ASSOC);
 foreach ($res as $censo) {
    $datos['censos'][] = $censo;
  }

  $app->render('xml.php', $datos);
//	echo json_encode($datos);
        });


$app->delete('/eliminar/:id', function($id) use($app) {
  /* Validaciones */
  if (id_libro_invalido($id)) {
    $app->halt(400, "Error: El id '$id' no cumple con el formato correcto.");
  }

  /* Eliminación en la bd */
  $qry = $app->db->prepare("delete from censo where pk_censo= (:pk_censo)");
  $qry->bindParam(':pk_censo', $id);

  if ($qry->execute() === false) {
    /* Algún error se presentó con la bd */
    $app->halt(500, "Error: No se ha podido borrar el Censo con id '$id'.");
  }

  if ($qry->rowCount() != 1) {
    /* No se borró ningún libro en la bd */
    $app->halt(404, "Error: El Censo con id '$id' no existe.");
  }

  /* En caso de exito en el borrado del libro en la bd, se le indica al cliente */
  $app->halt(200, "Exito: El Censo con id '$id' ha sido borrado");
});


$app->get('/agregar/indicador', function() use($app) {
	$app->render('api/agregar.php');
})->name('agregar/indicador');

$app->get('/agregar/nota', function() use($app) {
	$app->render('api/ani.php');
})->name('agregar/nota');

$app->get('/agregar/censo', function() use($app) {
	$app->render('api/apost.php');
})->name('altausuarios');

$app->get('/eliminar', function() use($app) {
	$app->render('api/delete.php');
})->name('eliminar');

$app->get('/actualizar', function() use($app) {
	$app->render('api/update.php');
})->name('actualizar');
