<?php
ob_start();
session_start();
require_once 'includes/config.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
 header("Location: index.php");
 exit;
}

$error = false;

if( isset($_POST['login'])) {

	// prevent sql injections/ clear user invalid inputs
	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);
	// prevent sql injections / clear user invalid inputs

	// if there's no error, continue to login
	if (!$error) {
		$table = "user";
		$fields = array('id','name','email','pw','role');
		$condition = "WHERE email = '".$email."'";
		$row = $obj->read($table,$fields='*',$condition);
        if ( $row != [] && password_verify($pass, $row[0]['pw']) ) {
            $_SESSION['user'] = $row[0]['name'];
            $_SESSION['user_id'] = $row[0]['id'];
            if ( $row[0]['role'] == 2) {
            	$_SESSION['admin'] = 'nimda';
            }
            header("Location: index.php");
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
            header("Location: index.php?email=".$email."&error=".$errMSG);
            exit;
        }
	}

}	

header("Location: index.php");

ob_end_flush(); ?>

