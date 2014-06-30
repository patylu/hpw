<?php
require '../app/vendor/autoload.php';
$app = new \Slim\Slim();
$app->config(array(
    'templates.path' => '../app/templates/'
));
$app->container->singleton('db', function () {
  return new PDO("pgsql:host=127.0.0.1 user=a10161709
password=Pronalux12 dbname=a10161709");
});

require '../app/routes/root.php';
require '../app/routes/xml.php';

$app->run();
