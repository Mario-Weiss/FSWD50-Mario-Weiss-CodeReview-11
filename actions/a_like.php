<?php 
session_start();
if (isset($_SESSION['user']) && isset($_POST['check'])) {
	
	require "../includes/config.php";

	$table = $_POST['table'] ?? '';
	$id = $_POST['id'] ?? '';
	$user = $_POST['user'] ?? '';
	$fields = 'user_id, table_name, location_id';
	$values =  '"'.$user.'", "'.$table.'", "'.$id.'"';
	$condition  = 'WHERE user_id = "'.$user.'" AND table_name = "'.$table.'" AND location_id = "'.$id.'"';

	$row = $obj->read('likes',$fields,$condition);
	if ( $row != []) {
		echo "true";
	} else {
		$obj->insert('likes',$fields,$values);
		echo "false";
	}
}

?>