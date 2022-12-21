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
				<li><a class="active" href="About.php">About</a></li>
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
		
		<!----Service page section---->
		<section class="about_wrapper">
			<img class="banner_img_general" src="images/banner.png">
			<div class="about_main">
				<div class="title_text">
					<h1>About</h1>
					<h2><a href="Home.html">Home</a> / <a href="About.html">About</a></h2>
				</div>
				<div class="about_content">
					<blockquote>
						<p>Caring for all your family's dental needs. - Jurong West Dental</p>
					</blockquote>
					<div class="about_content_img">
						<img src="images/about1.jpeg">
					</div>
					<div class="about_content_text">
						<div class="about_headings_pos">
							<div class="about_headings">
								ULTIMATE AESTHESTICS
							</div>
						</div>
						<p>Jurong West Dental is located on the lively Boon Lay in Jurong West, where people
						come and go with convenient transportation functions, providing a convenient transportation
						location for patients. At the same time, we also provide advanced digital aesthetic dental
						treatment for each patient. No matter what kind of problem, you can leave it to us to help
						you solve all oral troubles. We have bright confident smiles for many of our regular customers,
						and become the most beloved dentist clinic in the region.</p>
					</div>
				</div>
				<div class="about_content">
					<div class="about_content_text" style="width: 70vw;">
						<div class="about_headings_pos" style="margin-right: 2000px; margin-top: 50px;">
							<div class="about_headings" style="width: 450px">
								A HEALTHY DOCTOR-PATIENT RELATIONSHIP
							</div>
						</div>
						<p>We care about the needs of every patient, because we are well aware of the troubles of 
						oral discomfort, and we need to think for the patient more than the heart. Therefore, we are 
						committed to establishing the doctor-patient relationship on the basis of trust. Through 
						patient communication with doctors, we can help patients to mitigate their symptoms. Despit the 
						possible tense feeling of seeing the dentist, through the careful observation and professional 
						diagnosis of the doctor, we establish a good mutual trust relationship with the patient, so that 
						the patient can be completely at ease during the diagnosis and treatment process, and more 
						importantly, the patient is satisfied with the treatment effect. Jurong West Dental featured 
						quality dentists and is an aesthetic-centered clinic.</p>
					</div>
				</div>
				<div class="about_content">
					<div class="about_content_text" style="width: 70vw;">
						<div class="about_headings_pos" style="margin-right: 2000px;">
							<div class="about_headings" style="width: 450px">
								A HIGH-QUALITY AND PROFESSIONAL TEAM
							</div>
						</div>
						<p>Jurong West Dental is composed of nine doctors who have exceptional background in dental hospitals, 
						and each doctor has rich experience in consultation. Jurong West Dental integrates different specialists 
						to coordinate consultations to provide patients with a full range of customized diagnosis and treatment 
						services. Even in the face of complex oral problems, out top medical team can help patients to address them 
						professionally and effectively. Oral treatment service saves patients the trouble of going to and from 
						different hospitals and clinics. We strive to become the first choice for patients' dental treatment.</p>
					</div>
				</div>
				<div class="about_content">
					<div class="about_content_bottom">
						<img src="images/about2.jpg">
						<img src="images/about3.jpg">
						<img src="images/about4.jpg">
					</div>
					<div class="about_content_text" style="width: 70vw;">
						<div class="about_headings_pos" style="margin-right: 2000px;">
							<div class="about_headings" style="width: 450px">
								COMFORTABLE CONSULTATION ENVIRONMENT
							</div>
						</div>
						<p>In order to create a warm aesthetic space, Jurong West Dental pays great attention to the configuration 
							of the space and the selection of color tones. We plan an independent consultation room with high privacy 
							for patients, so that patients will not be disturbed during diagnosis and treatment. We also have an 
							exclusive children's clinic to deal with children that are more nervous to see the dentist, so that the 
							treatment can be carried out smoothly. It is hoped that through the warm space atmosphere, patients can 
							have a comfortable experience, and leave our dental with beautiful teeth and a lively mood.</p>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>