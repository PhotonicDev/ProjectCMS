<?php
include_once ("includes/session.php");
logged_in();


echo "Welcome " . $_SESSION['username'] . " you are logged in !";