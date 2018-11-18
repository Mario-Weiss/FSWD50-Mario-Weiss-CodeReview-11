<?php
session_start();

include "includes/_head.php";

?>
	<title>Travel-o-matic</title>
</head>
<body class="bg-light">

<?php 

include "includes/_header.php";

if (isset($_SESSION['user'])) {

	include "includes/_main.php";

	include "includes/_form.php";

	include "includes/_details.php";

	include "includes/_foot.php";
 ?>
	<script src="js/travel.min.js"></script>


<?php } elseif (isset($_GET['signup']) || isset($_POST['signup'])) {
	$error = false;

	if ( isset($_POST['signup']) ) {
		require "includes/config.php";
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
				unset($name);
				unset($email);
				unset($pass);
				unset($password);
				echo("<script>swal('Successfully registered!', 'you may login now', 'success').then((value) => {var a = window.location.href; window.location.href=a;});</script>");
			} else {
				echo("<script>swal('Error!', 'Something went wrong, try again later...', 'warning');</script>");
			}
		}
	}

?>

<div class="container-fluid pt-5">
		<div class="row">
			<div class="col-12 col-md-6 text-center align-content-center m-auto">
				<h2>Please Sign Up</h2><br>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" accept-charset="utf-8">   
          			<input class="form-control mx-2" type="text" name="name" placeholder="Enter Name" maxlength="50" value="<?php if (isset($name)){echo $name;} ?>" >
					<p class="text-danger">&nbsp;<?php if (isset($nameError)){echo $nameError;}; ?></p>
					<input class="form-control mx-2" type="email" name="email" placeholder="Enter Your Email" maxlength="40" value="<?php if (isset($email)){echo $email;} ?>" >
					<p class="text-danger">&nbsp;<?php if (isset($emailError)){echo $emailError;} ?></p>
					<input class="form-control mx-2" type="password" name="pass" placeholder="Enter Password" maxlength="25">
					<p class="text-danger">&nbsp;<?php if (isset($passError)){echo $passError;} ?></p>
        			<button type="submit" class="btn btn-sm btn-outline-success mx-2" name="signup">Sign Up</button>
        		</form>
				<div class="mt-2">
					<small><a href="index.php">or Log In here...</a></small>
				</div>
			</div>
		</div>
	</div>
<?php


} else { ?>


<div class="container-fluid pt-5">
		<div class="row">
			<div class="col-12 col-md-6 text-center align-content-center m-auto">
				<h2>Please Log In</h2><br>
				<form action="login.php" method="post" accept-charset="utf-8">   
          			<input class="form-control mx-2" type="email" placeholder="Email" aria-label="Search"  name="email" value="<?php if (isset($_GET['email'])){echo $_GET['email'];}; ?>"><br>
					<input class="form-control mx-2" type="password" placeholder="Password" aria-label="Search"  name="pass">
        			<span class="text-danger"><?php if (isset($_GET['error'])){echo $_GET['error'];}; ?></span><br>
					
        			<button type="submit" class="btn btn-sm btn-outline-success mx-2" name="login">Log In</button>
        		</form>
				<div class="mt-2">
					<small><a href="index.php?signup=1">or Sign Up here...</a></small>
				</div>
			</div>
		</div>
	</div>


<?php } ?> 	
</body>
</html>