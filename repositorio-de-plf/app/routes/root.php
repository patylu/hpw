<?php

$app->get('/', function() use($app) {
  $datos = array(
    'titulo' => 'Censo de conteo de poblacion y vivienda',
  );
  $app->render('root.php', $datos);
});
