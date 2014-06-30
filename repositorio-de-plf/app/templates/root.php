<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $titulo; ?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body onload="Aplicacion.main();">
  <!--[if lt IE 7]>
  <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <div class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><?php echo $titulo; ?></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav"><li class="active"><a href="/">CENSO</a></li></ul>
      </div>
        <ul class="nav navbar-nav"><li class="active"><a href="/censo">GET</a></li></ul>
        <ul class="nav navbar-nav"><li class="active"><a href="registrar/nota">POST NOTA</a></li></ul>
        <ul class="nav navbar-nav"><li class="active"><a href="registrar/censo">POST CENSO</a></li></ul>
        <ul class="nav navbar-nav"><li class="active"><a href="registrar/indicador">POST INDICADOR</a></li></ul>
        <ul class="nav navbar-nav"><li class="active"><a href="actualizar">DELETE</a></li></ul>
        <ul class="nav navbar-nav"><li class="active"><a href="eliminar">UPDATE</a></li></ul>
    </div>
  </div>
  <div class="container">
    <div id="div_form"></div>
    <div id="div_resultado"></div>
   </div>
  <script src="js/vendor/jquery-1.11.0.min.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/censo.js"></script>
  </body>
</html>
