<script type="text/JavaScript">
    function change_name(){
        window.location.href = "Member.php?change=name";
    }
    function change_phone(){
        window.location.href = "Member.php?change=phone";
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
if(isset($_GET['change'])){
    $change = $_GET["change"];
}

if ($identity == 'patient')
{
    $upcoming = 'select `bookid`, `name`, `phone`, `email`, `slot` from  ';
    $upcoming.= '(select * from `booking` where `patientid` = "';
    $upcoming.= "$userid";
    $upcoming.= '") as `bookings` inner join `users` ';
    $upcoming.= 'where `bookings`.`doctorid` = `users`.`userid` order by `bookid` desc;';
}
else
{
    $upcoming = 'select `bookid`, `name`, `phone`, `email`, `slot` from  ';
    $upcoming.= '(select * from `booking` where `doctorid` = "';
    $upcoming.= "$userid";
    $upcoming.= '") as `bookings` inner join `users` ';
    $upcoming.= 'where `bookings`.`patientid` = `users`.`userid` order by `bookid` desc;';
}
$upcoming = $db->query($upcoming);
$num_rows = $upcoming->num_rows;
$address = "Address: Jurong West Dental (55 Jurong East Ave 1, Singapore 609774)";

if(isset($_POST['newname'])){
    $newname = $_POST['newname'];
    $update = 'update `users` set `name` = "'.$newname.'" where `userid` = "'.$userid.'";';
    $update = $db->query($update);
}
if(isset($_POST['newphone'])){
    $newphone = $_POST['newphone'];
    $update = 'update `users` set `phone` = "'.$newphone.'" where `userid` = "'.$userid.'";';
    $update = $db->query($update);
}

$info = 'select `name`, `phone` from `users` where `userid` = "'.$userid.'";';
$info = $db->query($info);
$info = $info->fetch_assoc();
$name = $info['name'];
$phone = $info['phone'];
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
					<h2>PERSONAL INFORMATION</h2>
					<h1>Jurong West Dental Booking System</h1>
                    <?php
                        if (isset($change) && $change == 'name'){
                            echo '<h3 id="change_name">Name: ';
                            echo '<form method="post" action="member.php">';
                            echo '<input type="text" id="newname" name="newname">';
                            echo '<button type="submit">Confirm</button>';
                            echo '</form>';
                            echo '</h3>';
                        }
                        else{
                            echo '<h3 id="change_name">Name: '.$name.'</h3>';
                            echo '<button onclick="change_name()">Change name</button>';
                        }
                        if (isset($change) && $change == 'phone'){
                            echo '<h3 id="change_name">Phone number: ';
                            echo '<form method="post" action="member.php">';
                            echo '<input type="text" id="newphone" name="newphone">';
                            echo '<button type="submit">Confirm</button>';
                            echo '</form>';
                            echo '</h3>';
                        }
                        else{
                            echo '<h3 id="change_phone">Phone number: '.$phone.'</h3>';
                            echo '<button onclick="change_phone()">Change phone number</button>';
                        }
                        
                    ?>
                    
				</div>
			</div>
        </section>
      
        <!----Member page section---->
        <section class="login_wrapper">
            <div class="banner_login">
				<div class="banner_login_text">
					<h2>BOOK RESERVATION</h2>
                    <a href="logout.php"><button>Log out</button></a>
                    <a href="new_booking.php"><button>New Appointment</button></a>
                    <?php
                        echo'<h3>Welcome, '."$userid".'</h3>';
                        echo '<p id="num_upcoming"></p>';
                    ?>
                    
				</div>
			</div>
        </section>
    </div>
</body>
</html>
<?php
$num_upcoming = 0;
if ($num_rows >0)
{   
    if ($identity == 'patient'){
      $person = "Dentist Name: ";
    }
    else {
        $person = "Patient Name: ";
    }
    $today = date("Y-m-d H:i");
    for ($i=0; $i <$num_rows; $i++) { 
        $row = $upcoming->fetch_assoc();
        echo '<div class="login_main">';
        echo '<div class="signup">';
        echo '<p style="text-align:center; margin-top: 50px; color:black" id="booked">';
        if ($row['slot'] < $today){
            echo '<h3 style="text-align: center;">----- PAST APPOINTMENT -----</h3>';
        }
        echo '<ul style="margin-left: 80px; margin-right: 80px;">';
        echo '<li>Book ID: '.$row['bookid'].'</li>';
        echo '<li>'."$person".$row['name'].'</li>';
        echo '<li>'."$address".'</li>';
        echo "<li>"."Appointment: ".$row['slot']."</li>";
        echo '</ul>';
        echo '</p>';
        if ($row['slot'] > $today){
            $url_cancel = "confirm_cancel.php?bookid=".$row['bookid'];
            $url_reschedule = "reschedule.php?bookid=".$row['bookid'];
            $num_upcoming = $num_upcoming + 1;
        
?>
        <a style="text-decoration: none;" href=<?php echo $url_cancel; ?>><button onclick="return confirm('Confirm to cancel?');">Cancel</button></a>
        <a style="text-decoration: none;" href=<?php echo $url_reschedule; ?>><button>Reschedule</button></a>
<?php
        }
        echo '</div>';
        echo '</div>';
    }
    echo '<script type="text/JavaScript">document.getElementById("num_upcoming").innerHTML = "You have '.$num_upcoming.' upcoming appointment(s):<br>";</script>';
}
else
{
    echo '<script type="text/JavaScript">document.getElementById("num_upcoming").innerHTML = "You have no upcoming appointment.<br>";</script>';
}
if ($identity == 'dentist'){
    echo '<div class="wrapper">';
    echo '<section class="login_wrapper">';
    echo '<div class="banner_login">';
    echo '<div class="banner_login_text">';
    echo '<h2>LEAVE APPLICATION</h2>';
    echo '<h3 id="leave">[Reminder] You must clear all leave(s) before applying for another one.</h3>';
    echo '</div></div></section></div>';

    $view_leave = 'select * from `leave` where `doctorid` = "';
    $view_leave.= $userid;
    $view_leave.= '";';
    $view_leave = $db->query($view_leave);
    $num_rows = $view_leave->num_rows;
    $view_leave_results = $view_leave->fetch_assoc();

    if ($num_rows > 0){
        if ($view_leave_results['end_date'].' '.$view_leave_results['end_time'] < date("Y-m-d H:i")){
            $delete_past_leave = 'delete from `leave` where `doctorid` = "';
            $delete_past_leave.= "$userid";
            $delete_past_leave.= '";';
            $delete_past_leave = $db->query($delete_past_leave);
        }
        else{
            echo '<div class="login_main">';
            echo '<div class="signup">';
            echo '<p style="text-align:center; margin-top: 50px; color:black" id="booked">';
            echo '<ul style="margin-left: 80px; margin-right: 80px;">';
            echo '<li>Start: '.$view_leave_results['start_date'].' '.$view_leave_results['start_time'].'</li>';
            echo '<li>End: '.$view_leave_results['end_date'].' '.$view_leave_results['end_time'].'</li>';
            echo '</ul>';
            echo '</p>';
            if ($view_leave_results['start_date'].' '.$view_leave_results['start_time'] > date("Y-m-d H:i")){
?>
                <a style="text-decoration: none;" href="cancel_leave.php"><button onclick="return confirm('Confirm to cancel?');">Cancel Leave</button></a>
<?php
            }
            echo '</div>';
            echo '</div>';
        }
    }
    $num_rows = $view_leave->num_rows;
    if ($num_rows == 0){
?>
    <script type="text/JavaScript">
        document.getElementById('leave').innerHTML = '<a href="apply_leave.php"><button>Apply For Leave</button></a>';
    </script>
<?php  
    }
}
?>