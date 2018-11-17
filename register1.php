<?php 
ob_start(); // activte buffering output
session_start();  // start session


if ( isset($_SESSION['user'])!="" ) {
	header("Location: index.php"); // redirects to home.php if user session exists and if it is not empty
}
require_once 'includes/config.php';

$error = false;

if ( isset($_POST['signup']) ) {
	// sanitize user input to prevent sql injection
	$name = trim($_POST['name']); //trim - strips whitespace (or other characters) from the beginning and end of a string
	$name = strip_tags($name);  // strip_tags — strips HTML and PHP tags from a string
	$name = htmlspecialchars($name);  // htmlspecialchars converts special characters to HTML entities

	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);

	// basic name validation
	if (empty($name)) {
		$error = true;
		$nameError = "Please enter your full name.";
	} elseif (strlen($name) < 3) {
		$error = true;
		$nameError = "Name must have at least 3 characters.";
	} elseif (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$nameError = "Name must contain alphabets and space";
	}

	// basic email validation
	if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError  = "Please enter a valid email adress.";
	} else {
		// check if email exist or not
		$table = "user";
		$fields = "email";
		$condition = "WHERE email = '".$email."'";
		$row = $obj->read($table,$fields, NULL,$condition,NULL);
		if ( $row != [] ) {
			$error = true;
			$emailError = "Provided email is already in use.";
		}
	}

	// password validation
	if ( empty($pass) ) {
		$error = true;
		$passError = "Please enter a password";
	} elseif ( strlen($pass) < 6 ) {
		$error = true;
		$passError = "Password must have at least 6 characters.";
	}

	// pasword hashing for security
	$password = password_hash($pass, PASSWORD_DEFAULT);

	// if there is no error, user will be created
	if ( !$error ) {
		$table = "user";
		$fields = array('name','email','pw');
		$values = array($name,$email,$password);
		$res = $obj->insert($table, $fields, $values);


		if ($res) {
			$errTyp = "success";
			$errMSG = "Successfully registered, you may login now";
			unset($name);
			unset($email);
			unset($pass);
			unset($password);
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong, try again later...";
		}
	}
}

?>
<?php 

require "includes/_head.php";

 ?>
	<title>Login & Registration System</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 mt-5">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
					<h2>Sign Up</h2>
					<hr>

					<?php if ( isset($errMSG)) { ?>
						<div class="alert alert-<?php echo $errTyp; ?>">
							<?php echo $errMSG; ?>
						</div>
					<?php } ?>
					
					<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php if (isset($name)){echo $name;} ?>" >
					<span class="text-danger"><?php if (isset($nameError)){echo $nameError;}; ?></span>
					<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php if (isset($email)){echo $email;} ?>" >
					<span class="text-danger"><?php if (isset($emailError)){echo $emailError;} ?></span>
					<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="25">
					<span class="text-danger"><?php if (isset($passError)){echo $passError;} ?></span>
					<hr>
					<button type="submit" class="btn btn-block btn-primary" name="signup">Sign Up</button>
					<hr>
					<a href="login.php">Sign in Here...</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php ob_end_flush(); ?>

