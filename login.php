<!DOCTYPE html>
<html lang="en">
<head>
	<title>Jurong West Dental</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<script type="text/JavaScript">
		function checkName() {
			var name = document.getElementById('user_name').value;
			var check_name = /^[A-Za-z\s]{3,}$/.test(name);
			if (check_name == false) {
				error_msg = 'Your user name must contain at least 3 alphanumeric characters.\n\n';
				alert(error_msg);
			}
		}
		function checkEmail() {
			var email = document.getElementById('reg_email').value;
			var check_email = /^([\w\-.]+)@([\w]+\.){1,3}(\w){2,3}$/.test(email);
			if (check_email == false) {
				error_msg = 'Your email should match the following \n'+
				'1. Contain only word charcaters, hypens and commas \n' +
				'2. There should be 2 to 4 extensions separated by commas, and the last extension should have 2 or 3 characters\n\n';
				alert(error_msg);
			}
		}
		function checkPswd() {
			var pswd = document.getElementById('reg_pswd').value;
			var check_pswd = /^[!@#$%^&*_?A-Za-z\d]{8,}$/.test(pswd);
			if (check_pswd == false) {
				error_msg = 'Your password should match the following \n'+
				'1. Contain only contain word charcaters, numbers and speical characters _@!? \n' +
				'2. Length must be at least 8\n\n';
				alert(error_msg);
			}
		}	
	</script>
</head>
<body>
	<div class="wrapper">
		<nav class="navbar">
			<img class="logo_nav" src="images/logo.png">
			<ul>
				<li><a href="Home.php">Home</a></li>
				<li><a href="About.php">About</a></li>
				<li><a href="Service1.php">Service</a>
					<div class="sub-menu-service">
						<ul>
							<li><a href="Service1.php">Fillings</a></li>
							<li><a href="Service2.html">Microendodontics</a></li>
							<li><a href="Service3.html">Implants</a></li>
							<li><a href="Service4.html">Braces/Invisalign</a></li>
						</ul>
					</div>
				</li>
				<li><a href="Team.php">Team</a></li>
				<?php
					$link = '<li><a href="login.php">Log In</a></li>';
					$href = "login.php";
					$new_href = "member.php";
					if (isset($_SESSION['userid'])){
						$link = str_replace($href, $new_href, $link);
					}
					echo $link;
				?>
			</ul>
		</nav>
		<section class="login_wrapper">
			<div class="banner_login">
				<div class="banner_login_text">
					<h2>BOOK RESERVATION</h2>
					<h1>Jurong West Dental Booking System</h1>
				</div>
			</div>
			<div class="login_main">
				<input type="checkbox" id="chk" aria-hidden="true">
				<div class="signup">
					<form name="signup" id="signup" method="post" action="login.php">
						<label for="chk" aria-hidden="true">Sign up</label>
						<input type="text" name="txt" id="user_name" placeholder="User name" onchange="checkName()" required="">
						<input type="email" name="reg_email" id="reg_email" placeholder="Email" onchange="checkEmail()" required="">
						<input type="Password" name="reg_pswd" id="reg_pswd" placeholder="Password" onchange="checkPswd()" required="">
						<button type = "submit" id = "SignupButton" value="Sign up">Sign up</button>
						<p style="text-align:center; color:red" id="SignupError"></p>
					</form>
				</div>
				
				<div class="login">
					<form name="login" id="login" method="post" action="login.php">	
						<label for="chk" aria-hidden="true">Login</label>
						<input type="email" name="log_email" placeholder="Email" required="">
						<input type="Password" name="log_pswd" placeholder="Password" required="">
						<button type = "submit" id = "LoginButton" value="Login">Login</button>
						<p style="text-align:center; color:red" id="LoginError"></p>
					</form>		
				</div>
			</div>
		</section>
	</div>
	<footer>
		<div class="footer">
		</div>
	</footer>
</body>
</html>

<?php
// Enable debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include "dbconnect.php";
session_start();

if (isset($_POST['log_email']) && isset($_POST['log_pswd']))
{
	// Log in
	// credentials wrong
	$log_email = $_POST['log_email'];
	$log_pswd = $_POST['log_pswd'];
	$log_pswd = md5($log_pswd);
	$query = 'select * from users '
			."where email='$log_email' "
			." and pswd='$log_pswd'";
	$result = $db->query($query);
	if ($result->num_rows >0 )
	{
		$row = $result->fetch_assoc();
		$_SESSION['userid'] = $row['userid'];
		$_SESSION['identity'] = $row['identity'];
		echo '<script type="text/JavaScript"> document.getElementById("chk").checked = true; </script>';
		echo '<script type="text/JavaScript"> 
    			  alert("Login successful!");
     	  	  </script>';
		echo '<meta http-equiv="refresh" content="0; url = Member.php" />';
	}
	else
	{
		echo '<script type="text/JavaScript"> document.getElementById("LoginError").innerHTML = "Invalid email or password."; </script>';
		echo '<script type="text/JavaScript"> document.getElementById("chk").checked = true; </script>';
	}
  
}

elseif (isset($_POST['reg_email']) && isset($_POST['reg_pswd']) && isset($_POST['txt']))
{
	// Register
	// user has already existed
	$txt = $_POST['txt'];
	$reg_email = $_POST['reg_email'];
  	$reg_pswd = $_POST['reg_pswd'];
  	$reg_pswd = md5($reg_pswd);

	$check_userid = 'select * from users '
					."where userid='$txt' ";
	$check_userid = $db->query($check_userid);
	$check_email = 'select * from users '
					."where email='$reg_email' ";
	$check_email = $db->query($check_email);

	if ($check_userid->num_rows >0)
	{
		echo '<script type="text/JavaScript"> document.getElementById("SignupError").innerHTML = "Username already exists!"; </script>';
	}
	elseif ($check_email->num_rows >0)
	{
		echo '<script type="text/JavaScript"> document.getElementById("SignupError").innerHTML = "Email already exists!"; </script>';
	}
	else
	{
		$query = "insert into users values
				('".$txt."', '".$reg_email."', '".$reg_pswd."', 'patient','".$txt."', NULL)";
		$result = $db->query($query);
		$_SESSION['userid'] = $txt;
		$_SESSION['identity'] = 'patient';
		echo '<script type="text/JavaScript"> 
    			  alert("Registration successful!");
     	  	  </script>';
		echo '<meta http-equiv="refresh" content="0; url = Member.php" />';
	}
}
$db->close();
?>