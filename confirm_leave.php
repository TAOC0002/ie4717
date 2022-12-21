<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include "dbconnect.php";
session_start();
$userid = $_SESSION['userid'];
$start_leave_date = $_GET['start_leave_date'];
$start_leave_time = $_GET['start_leave_time'];
$end_leave_date = $_GET['end_leave_date'];
$end_leave_time = $_GET['end_leave_time'];
$insert = 'insert into `leave` values ("'.$userid.'", "'.$start_leave_date.'", "'.$start_leave_time;
$insert.= '", "'.$end_leave_date.'", "'.$end_leave_time.'");';
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
                        if ($start_leave_date > $end_leave_date){
                            echo "<div class='title_text'><h2>Warning: start date must be before end date</h2></div>";
                            echo '<a href="javascript:history.go(-1)">Go Back</a>';
                        }
                        elseif ($start_leave_date == $end_leave_date && $start_leave_time >= $end_leave_time){
                            echo "<div class='title_text'><h2>Warning: start time must be before end time</h2></div>";
                            echo '<a href="javascript:history.go(-1)">Go Back</a>';
                        
                        }
                        else{
                            // Not allowed to take leave if there are appointments in between
                            $start = $start_leave_date.' '.$start_leave_time;
                            $end = $end_leave_date.' '.$end_leave_time;
                            $check = 'select * from `booking` where `doctorid` = "'.$userid.'" and `slot` > "'.$start.'" and `slot` < "'.$end.'";';
                            $check = $db->query($check);
                            $num_rows = $check->num_rows;
                            if ($num_rows > 0){
                                echo "<div class='title_text'><h2>You have appointment(s) in between your leave. Please reselect leave dates.</h2></div>";
                                for ($i=0; $i <$num_rows; $i++) { 
                                    $row = $check->fetch_assoc();
                                    echo '<ul>';
                                    echo '<li>Booking ID: '.$row['bookid'].'</li>';
                                    echo '<li>Patient ID: '.$row['patientid'].'</li>';
                                    echo '<li>Appointment: '.$row['slot'].'</li>';
                                    echo '</ui>';
                                }
                                echo '<a href="javascript:history.go(-1)">Reselect Leave Dates</a>';
                            }
                        }
                        else{
                            $insert = $db->query($insert);
                            echo "<div class='title_text'><h1>Redirecting in 3 seconds</h1></div>";
                            echo "<div class='title_text'><h2>You have successfully applied for leave.</h2></div>";
                            header("refresh:3;url=member.php");
                        }
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

