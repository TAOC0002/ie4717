<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include "dbconnect.php";
session_start();
$userid = $_SESSION['userid'];
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
                <li><a href="Service1.php">Service</a>
                    <ul>
                        <li><a href="Service1.php">Fillings</a></li>
                        <li><a href="Service2.php">Microendodontics</a></li>
                        <li><a href="Service3.php">Implants</a></li>
                        <li><a href="Service4.php">Braces/Invisalign</a></li>
                    </ul>
                </li>
                <li><a href="Team.php">Team</a></li>
                <li><a class="active" href="member.php">Log In</a></li>
            </ul>
        </nav>
      
      <!----Leave page section---->
        <section class="login_wrapper">
            <div class="banner_login">
				<div class="banner_login_text">
					<h2>BOOK RESERVATION</h2>
					<h1>Jurong West Dental Booking System</h1>
				</div>
			</div>
            <?php
                $today = date("Y-m-d");
                $start_date = date('Y-m-d', strtotime($today . ' +1 day'));
                $end_date = date('Y-m-d', strtotime($start_date . ' +365 day'));
                $time_start = '10:00';
                $time_end = '20:00';
                $timestamp_start = strtotime(date("Y-m-d").' '.$time_start);
                $timestamp_end   = strtotime(date("Y-m-d").' '.$time_end);

                echo '<div class="login_main">';
                echo '<div class="signup">';
                echo '<p id="booked">';
                echo '<form action="confirm_leave.php" method="get" style="margin-top: 40px; margin-left: 20px; margin-right: 20px; color:black; text-align:center;">';
                echo 'From: ';
                echo '<input type="date" id="start_leave_date" name="start_leave_date" min="'.$start_date.'" max="'.$end_date.'" required>';
                echo '<select id="start_leave_time" name="start_leave_time" required>';
                echo '<option value="">------</option>';
                while($timestamp_start <= $timestamp_end){
                    $start = date('H:i', $timestamp_start);
                    $timestamp_start = $timestamp_start+3600; // adds 1 hour
                    $end = date('H:i', $timestamp_start);
                    echo '<option value="'."$start".'">'.$start.'</option>';
                }
                echo '</select>';

                echo '<br><br><br>To: ';
                echo '<input type="date" id="end_leave_date" name="end_leave_date" min="'.$start_date.'" max="'.$end_date.'" required>';
                echo '<select id="end_leave_time" name="end_leave_time" required>';
                echo '<option value="">------</option>';
                $timestamp_start = strtotime(date("Y-m-d").' '.$time_start);
                while($timestamp_start <= $timestamp_end){
                    $start = date('H:i', $timestamp_start);
                    $timestamp_start = $timestamp_start+3600; // adds 1 hour
                    $end = date('H:i', $timestamp_start);
                    echo '<option value="'."$start".'">'.$start.'</option>';
                }
                echo '</select>';
                
            ?>
                <button type = "submit">Apply</button>
            <?php
                echo '<a href="javascript:history.go(-1)">Go Back</a>';
                echo '</form>';
                echo '</p>';
                echo '</div>';
                echo '</div>';
            ?>
        </section>
    </div>
</body>
</html>
<?php

?>