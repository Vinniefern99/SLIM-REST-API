<?php
function getStates() {
	$db = connect_db ();
	$result = $db->query ( 'SELECT * FROM state;' );
	while ( $row = $result->fetch_array ( MYSQLI_ASSOC ) ) {
		$data [] = $row;
	}
	
	$app->render ( 'state.php', array (
			'page_title' => "All States",
			'data' => $data 
	) );
} 