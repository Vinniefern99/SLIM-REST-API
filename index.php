<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';
require 'lib/mysql.php';

\Slim\Slim::registerAutoloader ();

/**
 * Step 2: Instantiate a Slim application
 */
$app = new \Slim\Slim ();

$db = connect_db ();

/*
 * Get a list of all states
 */
$app->get ( '/states', function () use($app) {
	$result = $db->query ( 'SELECT * FROM state;' );
	while ( $row = $result->fetch_array ( MYSQLI_ASSOC ) ) {
		$data [] = $row;
	}
	
	$app->render ( 'state.php', array (
			'page_title' => "All States",
			'data' => $data 
	) );
} );

/*
 * Get a list of all cities in a particular state
 */
$app->get ( '/states/:state', function ($state) {
	$result = $db->query ( 'SELECT * FROM city WHERE ;' );
	echo "Hello, $state";
} );

/*
 *
 */

// POST route
$app->post ( '/post', function () {
	echo 'This is a POST route';
} );

// PUT route
$app->put ( '/put', function () {
	echo 'This is a PUT route';
} );

// PATCH route
$app->patch ( '/patch', function () {
	echo 'This is a PATCH route';
} );

// DELETE route
$app->delete ( '/delete', function () {
	echo 'This is a DELETE route';
} );

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run ();
