<?php 
session_start();
if (isset($_SESSION['admin'])) {
	require "../includes/config.php";
	
	$table = $_POST['table'] ?? '';
	$id = $_POST['id'] ?? '';

	$condition['id'] = $id;

	$obj->delete($table,$condition);

}


 ?>