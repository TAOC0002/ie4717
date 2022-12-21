<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include "dbconnect.php";
session_start();
$userid = $_SESSION['userid'];
$cancel = 'delete from `leave` where `doctorid` = "';
$cancel.= "$userid";
$cancel.= '";';
$cancel = $db->query($cancel);
?>
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
                        <li><a href="Service2.php">Microendodontics</a></li>
                        <li><a href="Service3.php">Implants</a></li>
                        <li><a href="Service4.php">Braces/Invisalign</a></li>
                    </ul>
                </li>
                <li><a href="Team.php">Team</a></li>
                <li><a href="member.php">Log In</a></li>
            </ul>
        </nav>
        <section class="about_wrapper">
            <div class="about_main">
                <div class="about_content">
                    <?php
                        echo "<div class='title_text'><h1>Redirecting in 3 seconds</h1></div>";
                        echo "<div class='title_text'><h2>You have successfully cancelled your leave.</h2></div>";
                        header("refresh:3;url=member.php");
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

