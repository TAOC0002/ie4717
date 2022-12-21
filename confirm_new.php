<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include "dbconnect.php";
session_start();
$userid = $_SESSION['userid'];
$identity = $_SESSION['identity'];
$person = $_SESSION["person"];
$reserve_date = $_SESSION["reserve_date"];
$reserve_time = $_SESSION["reserve_time"];

// Determine bookid
$bookid_query = 'select max(`bookid`) as `maxbookid` from `booking`';
$bookid_query = $db->query($bookid_query);
if ($bookid_query->num_rows >0 )
{
    $row = $bookid_query->fetch_assoc();
    $book_curmax = $row['maxbookid'];
}
if (isset($book_curmax)){
    $bookid = $book_curmax + 1;
}
else{
    $bookid = 1;
}

// insert booking record
$new = 'insert into `booking` values ("';
$new.= "$bookid";
$new.= '", "';
if ($identity == 'patient'){
    $new.= $person;
    $new.= '", "';
    $new.= $userid;    
} else {
    $new.= $userid;
    $new.= '", "';
    $new.= $person;
}
$new.= '", "';
$new.= $reserve_date;
$new.= ' ';
$new.= $reserve_time;
$new.= '");';
$new = $db->query($new);
unset($_SESSION["person"]);
unset($_SESSION["reserve_date"]);
unset($_SESSION["reserve_time"]);
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
                        echo "<div class='title_text'><h1>Redirecting in 5 seconds</h1></div>";
                        if ($identity == 'dentist'){
                            echo "<div class='title_text'><h2>Appointment confimed. An email has been sent to both you and the patient.</h2></div>";
                        } else {
                            echo "<div class='title_text'><h2>Appointment confirmed. An email has been sent to both you and the doctor. We hope to see your again.</h2></div>";
                        }
                        header("refresh:5;url=member.php");
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

