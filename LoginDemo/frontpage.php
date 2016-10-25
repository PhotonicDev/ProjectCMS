<?php
include_once ("includes/session.php");
require_once ("includes/functions.php");

confirm_logged_in();
echo "Welcome " . $_SESSION['username'] . " you are logged in !";


?>

<link href="stylesheet.css" type="text/css" rel="stylesheet"/>


<div style="float:right"><a href="logout.php"> <button type="button" class="cancelbtn">Log out</button></a></div>
