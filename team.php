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
				<li><a href="Service1.php">Service</a>
					<ul>
						<li><a href="Service1.php">Fillings</a></li>
						<li><a href="Service2.html">Microendodontics</a></li>
						<li><a href="Service3.html">Implants</a></li>
						<li><a href="Service4.html">Braces/Invisalign</a></li>
					</ul>
				</li>
				<li><a class="active" href="Team.php">Team</a></li>
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
		
		<!----Team page section---->
		<section class="team_wrapper">
			<img class="banner_img_general" src="images/banner.png">
			
			<div class="team_main">
				<div class="title_text">
					<h1>TEAM DIRECTORY</h1>
					<h2><a href="Home.html">Home</a> / <a href="#.html">Team Directory</a></h2>
				</div>
				
				<div class="team_all">
				
					<div class="team_gallery">
						<a href="#"><img src="images/dentist_icon.png"></a>
						<div class="team_name"><h3>Justin Chuang</h3></div>
					</div>

					<div class="team_gallery">
						<a href="#"><img src="images/dentist_icon.png"></a>
						<div class="team_name"><h3>Justin Chuang</h3></div>
					</div>

					<div class="team_gallery">
						<a href="#"><img src="images/dentist_icon.png"></a>
						<div class="team_name"><h3>Justin Chuang</h3></div>
					</div>

					<div class="team_gallery">
						<a href="#"><img src="images/dentist_icon.png"></a>
						<div class="team_name"><h3>Justin Chuang</h3></div>
					</div>

					<div class="team_gallery">
						<a href="#"><img src="images/dentist_icon.png"></a>
						<div class="team_name"><h3>Justin Chuang</h3></div>
					</div>					

					<div class="team_gallery">
						<a href="#"><img src="images/dentist_icon.png"></a>
						<div class="team_name"><h3>Justin Chuang</h3></div>

					</div>					

					<div class="team_gallery">
						<a href="#"><img src="images/dentist_icon.png"></a>
						<div class="team_name"><h3>Justin Chuang</h3></div>
					</div>

					<div class="team_gallery">
						<a href="#"><img src="images/dentist_icon.png"></a>
						<div class="team_name"><h3>Justin Chuang</h3></div>
					</div>
				</div>

			</div>
		</section>
		
		
	</div>
</body>
</html>