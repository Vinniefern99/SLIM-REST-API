<?php
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader ();
$app = new \Slim\Slim ();
$app->get ( '/', function () {
	$template = require_once 'templates/basictemplate.php';
	echo $template;
} );


$app->run ();