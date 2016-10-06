<?php
include_once ("includes/session.php");
require_once ("includes/functions.php");

confirm_logged_in();
echo "Welcome " . $_SESSION['username'] . " you are logged in !";





