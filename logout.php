<?php
    session_start();
    // store to test if they *were* logged in
    $old_user = $_SESSION['userid'];
    $old_identity = $_SESSION['identity'];
    unset($_SESSION['userid']);
    unset($_SESSION['identity']);
    session_destroy();
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
                        <li><a href="Service2.html">Microendodontics</a></li>
                        <li><a href="Service3.html">Implants</a></li>
                        <li><a href="Service4.html">Braces/Invisalign</a></li>
                    </ul>
                </li>
                <li><a href="Team.php">Team</a></li>
                <li><a href="Login.php">Log In</a></li>
            </ul>
        </nav>
        <!----Member page section---->
        <section class="about_wrapper">
            <div class="about_main">
                <?php
                    $userid = $_SESSION['userid'];
                    echo "<div class='title_text'><h1>Logged out</h1></div>";
                    echo "<div class='title_text'><h2>Redirecting in 3 seconds</h2></div>";
                    header("refresh:3;url=login.php");
                ?>
            </div>
        </section>
    </div>
</body>
</html>