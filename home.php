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
				<li><a class="active" href="Home.php">Home</a></li>
				<li><a href="About.php">About</a></li>
				<li><a href="Service1.php">Service</a>
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
		
		
		<!----Banner section---->
		<section class="banner_home">
			<img class="banner_img" src="images/banner.png">
			<img class="banner_block" src="images/banner_block.png">
		</section>
		
		<!----About section---->
		<section class="about_home">
			<div class="about_home_text">
				<h2>ABOUT US</h2>
				<h1>Jurong West Dental</h1>
				<img src="images/upward_bracket.png">
				<p>At Jurong West Dental, we are committed to providing you with dental care catered
				to your unique needs. Since the establishment of our first clinic in 1986, we have grown
				to over 16 clinics across Singapore. Today, we are proud to provide you with a full range
				of treatments to meet your dental needs.</p>
				<p>This is made possible by a dynamic and diverse group of professionals working together,
				in both our clinics and behind the scenes. We are passionate about helping our patients feel
				amazing about their oral health every time a bite is taken or a smile is shared.</p>
				<div class="readmore_about_pos">
					<div class="readmore">
						<a href="#">READ<br>MORE</a>
					</div>
				</div>
			</div>
			<div class="about_home_img">
				<img src="about_home.png">
			</div>
		</section>
		
		<!----Service section---->
		<section class="service_home">
			<h2>SERVICE</h2>
			<h1>Dental Project</h1>
			<img src="images/upward_bracket.png">
			<a href="Service1.html" class="service_home_button">Fillings</a>
			<a href="Service2.html" class="service_home_button">Microendodontics</a>
			<a href="Service3.html" class="service_home_button">Implants</a>
			<a href="Service4.html" class="service_home_button">Braces / Invisalign</a>
				<div class="readmore_service_pos">
					<div class="readmore">
						<a href="Service1.html">READ<br>MORE</a>
					</div>
				</div>
		</section>
		
		<!----Team section---->
		<section class="team_home">
			<h2>TEAM</h2>
			<h1>Dentist Crew</h1>
			<img src="images/upward_bracket.png">
			<p>Jurong West Dental integrates different specialists to coordinate consultations to provide
			patients with a full range of customized diagnosis and treatment services. Even in the face 
			of complex oral problems, the top medical team can help patients solve them and bring 
			professional and perfect oral cavity to patients. Treatment services, saving patients the 
			trouble of traveling to and from different hospitals and clinics, strive to be the first 
			choice for patients' dental treatment. A full range of professional dental services, 
			Singapore dentist recommends you Jurong West Dental!</p>
		</section>
	</div>
</body>
</html>