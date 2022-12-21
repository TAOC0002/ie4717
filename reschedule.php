<script type="text/JavaScript">
    function update_date(){
        var _date = document.getElementById("reschedule_date").value;
        let text = String(window.location.href);
        if (_date){
            let pattern = /(\&date=)[\d-]+$/;
            if (text.search(pattern) > 0){
                window.location.href = text.replace(pattern, "&date="+String(_date));
            } else {
                window.location.href = window.location.href+"&date="+String(_date);
            }
        }
    }
    function update_time(){
        var _time = document.getElementById("reschedule_time").value;
        let text = String(window.location.href);
        if (_time){
            let pattern = /(\&time=)*$/;
            if (text.search(pattern) > 0){
                window.location.href = text.replace(pattern, "&time="+String(_time));
            } else {
                window.location.href = window.location.href+"&time="+String(_time);
            }
        }
    }
</script>

<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include "dbconnect.php";
session_start();
$userid = $_SESSION['userid'];
$identity = $_SESSION['identity'];
$bookid = $_GET['bookid'];
$_SESSION['bookid'] = $bookid;
$view = 'select * from `booking` where `bookid` = '.$bookid;
$view = $db->query($view);
$view = $view->fetch_assoc();
$slot = $view['slot'];
if(isset($_GET['person'])){
    $person = $_GET["person"];
}
if(isset($_GET['date'])){
    $reschedule_date = $_GET["date"];
}
if(isset($_GET['time'])){
    $reschedule_time = $_GET["time"];
}
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
        <section class="login_wrapper">
            <div class="banner_login">
				<div class="banner_login_text">
					<h2>BOOK RESERVATION</h2>
					<h1>Jurong West Dental Booking System</h1>
				</div>
			</div>
            <?php
                echo '<div class="login_main">';
                echo '<div class="signup">';
                echo '<p style="margin-top: 40px; margin-left: 40px; margin-right: 40px; color:black" id="rescheduled">';
                echo 'Your booking:<br>';
                echo 'Booking ID: ';
                echo $bookid;
                echo '<br>';
                if ($identity == 'patient'){
                    $person = $view['doctorid'];
                    $find_name = 'select `name` from `users` where `userid` = "'.$person.'"';
                    $find_name = $db->query($find_name);
                    $find_name = $find_name->fetch_assoc();
                    echo 'Doctor: '.$find_name['name'];
                }
                else{
                    $person = $view['patientid'];
                    $find_name = 'select `name` from `users` where `userid` = "'.$person.'"';
                    $find_name = $db->query($find_name);
                    $find_name = $find_name->fetch_assoc();
                    echo 'Patient: '.$find_name['name'];
                }

                echo '<br>';
                echo 'Choose date: ';
                if (!isset($reschedule_date)){
                    $today = date("Y-m-d");
                    $start_date = date('Y-m-d', strtotime($today . ' +1 day'));
                    $end_date = date('Y-m-d', strtotime($start_date . ' +60 day'));
                    echo '<input type="date" id="reschedule_date" name="reschedule_date" onchange="update_date()" min="'.$start_date.'" max="'.$end_date.'">';
                }
                else
                {
                    $_SESSION['reschedule_date'] = $reschedule_date;
                    echo $reschedule_date;
                    echo '<br>';
                    echo 'Choose time: ';
                    if (!isset($reschedule_time)){
                        $time_start = '10:00';
                        $time_end = '19:30';
                        $timestamp_start = strtotime(date("Y-m-d").' '.$time_start);
                        $timestamp_end   = strtotime(date("Y-m-d").' '.$time_end);

                        $_check_patient = 'select * from `booking` where ';
                        $_check_dentist = 'select * from `booking` where ';
                        $_check_leave = 'select * from `leave` where `doctorid` = "';
                        if ($identity == 'patient'){
                            $_check_dentist.='`doctorid` = "'.$person.'" and ';
                            $_check_patient.='`patientid` = "'.$userid.'" and ';
                            $_check_leave.=$person.'";';
                        }
                        else{
                            $_check_patient.='`patientid` = "'.$person.'" and ';
                            $_check_dentist.='`doctorid` = "'.$userid.'" and ';
                            $_check_leave.=$userid.'";';
                        }
                        $_check_patient.='`slot` = "'.$reschedule_date.' ';
                        $_check_dentist.='`slot` = "'.$reschedule_date.' ';
                        $_check_leave = $db->query($_check_leave);
                        $num_leave = $_check_leave ->num_rows;
                        if ($num_leave > 0){
                            $_check_leave = $_check_leave->fetch_assoc();
                        }
                        echo '<select id="reschedule_time" name="reschedule_time" onchange="update_time()">';
                        echo '<option value="">------</option>';
                        // loop through until the end timestamp is reached
                        while($timestamp_start <= $timestamp_end){
                            $start = date('H:i', $timestamp_start);
                            $timestamp_start = $timestamp_start+1800; // adds 30 minutes 
                            $end = date('H:i', $timestamp_start);
                            $check_patient = $_check_patient.$start.'";';
                            $check_dentist = $_check_dentist.$start.'";';
                            $check_patient = $db->query($check_patient);
                            $check_dentist = $db->query($check_dentist);

                            $check_leave = 0; // 0 means valid
                            if ($num_leave > 0){
                                if ($_check_leave['end_date'].' '.$_check_leave['end_time'] >= $reschedule_date.' '.$start){
                                    if ($_check_leave['start_date'].' '.$_check_leave['start_time'] <= $reschedule_date.' '.$start){
                                        $check_leave = 1; // 1 means invalid
                                    }
                                }
                            }
                            if ($check_patient->num_rows == 0 && $check_dentist ->num_rows == 0 && $check_leave == 0){
                                echo '<option value="'."$start".'">'.$start.' - '.$end.'</option>';
                                echo $start.' - '.$end;
                            }
                        }
                        echo '</select>';

                    }
                    else{
                        $_SESSION['reschedule_time'] = $reschedule_time;
                        echo $reschedule_time;
                        echo '<br>';
                        ?>
                        <a style="text-decoration: none;" href="confirm_reschedule.php"><button onclick="return confirm('Confirm reschedule?');">Reschedule</button></a>
                        <?php
                    }
                }                
                echo '<br>';
                echo '<a href="javascript:history.go(-1)">Go Back</a>';
                echo '</p>';
                echo '</div>';
                echo '</div>';
            ?>
        </section>
    </div>
</body>
</html>

