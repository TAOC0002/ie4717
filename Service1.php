<!DOCTYPE html>
<html lang="en">
<head>
	<title>Jurong West Dental</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper">
		<nav class="navbar">
			<img class="logo_nav" src="images/logo.png">
			<ul>
				<li><a href="Home.php">Home</a></li>
				<li><a href="About.php">About</a></li>
				<li><a class="active" href="Service1.php">Service</a>
					<ul>
						<li><a href="Service1.php">Fillings</a></li>
						<li><a href="Service2.html">Microendodontics</a></li>
						<li><a href="Service3.html">Implants</a></li>
						<li><a href="Service4.html">Braces/Invisalign</a></li>
					</ul>
				</li>
				<li><a href="Team.php">Team</a></li>
				<?php
					$link = '<li><a href="login.php">Log In</a></li>';
					$href = "login.php";
					$new_href = "member.php";
					session_start();
					if (isset($_SESSION['userid'])){
						$link = str_replace($href, $new_href, $link);
					}
					echo $link;
				?>
			</ul>
		</nav>
		
		<!----Service page section---->
		<section class="service_wrapper">
			<img class="banner_img_general" src="images/banner.png">
			<div class="service_main">
				<div class="title_text">
					<h1>Fillings</h1>
					<h2><a href="Home.html">Home</a> / <a href="Service1.html">Service</a> / <a href="Service1.html">Fillings</a></h2>
				</div>
				<div class="service_body">
					<div class="sidebar">
						<h3>Service Project</h3>
						<ul>
							<li><a href="Service1.html">Fillings</a></li>
							<li><a href="Service2.html">Microendodontics</a></li>
							<li><a href="Service3.html">Implants</a></li>
							<li><a href="Service4.html">Braces/Invisalign</a></li>
						</ul>
					</div>
					<div class="service_content">
						<p></p>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>