<?php

require 'Slim/Slim.php';
require 'lib/mysql.php';
// require 'google/autoload.php';

\Slim\Slim::registerAutoloader ();

$app = new \Slim\Slim ();

/*
 * Display the homepage
 * This would be where I would build a UI
 */
$app->get ( '/', function () use($app) {
	$app->render ( 'homepage.php' );
} );

/*
 * Get a list of all states
 */
$app->get ( '/states', function () use($app) {
	$db = connect_db ();
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
$app->get ( '/states/:state/cities', function ($state) use($app) {
	$db = connect_db ();
	$result = $db->query ( "SELECT name FROM city WHERE state in (SELECT abbreviation FROM state where name = '$state');" );
	while ( $row = $result->fetch_array ( MYSQLI_ASSOC ) ) {
		$data [] = $row;
	}
	
	$app->render ( 'list_of_cities.php', array (
			'page_title' => "All Cities in $state",
			'data' => $data,
			'state' => $state 
	) );
} );

/*
 * 2. Allow to create rows of data to indicate they have visited a particular city.
 * POST /user/{user}/visits`
 */
$app->post ( '/user/:user', function ($user) use($app) {
	$request = $app->request();
	$body = $request->getBody();
	$visitrecord = json_decode($body);
	
	$city = $visitrecord->city;
	$state - $visitrecord->state;
	
	$db = connect_db ();
	$db->query ( "INSERT INTO visits(`user_id`, `city`) VALUES ('$user', '$city', '$state');" );
	echo 'This is a POST route';
} );

/*
 * 3. Allow a user to remove an improperly pinned visit.
 * `DEL /user/{user}/visit/{visit}`
 */
$app->delete ( '/delete', function () {
	echo 'This is a DELETE route';
} );

/*
 * 4. Return a list of cities the user has visited
	`GET /user/{user}/visits`
 */
$app->get ( '/put', function () {
	echo 'This is a PUT route';
} );

// PATCH route
$app->patch ( '/patch', function () {
	echo 'This is a PATCH route';
} );

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run ();
