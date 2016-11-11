<?php
include_once ('../model/Database.php');
		// Four steps to closing a session
		// (i.e. logging out)
		// 1. Find the session
function Conn(){
    $conn = include '../model/conn.php';
    $db = new Database($conn);
    return $db;

}
		session_start();
if(isset($_SESSION['user_id'])) {
    $useritemup = implode(' ', $_SESSION['up']);
    $usercart = implode(' ', $_SESSION['cart']);
    $useruser = $_SESSION['user_id'];
    Conn()->getQuery("UPDATE customers SET basket = '" . $usercart . "', up_votes = '" . $useritemup . "' WHERE `customer_id` = " . $useruser);
}
elseif (isset($_SESSION['temp_id'])) {
    $itemup = implode(' ', $_SESSION['up']);
    $cart = implode(' ', $_SESSION['cart']);
    $user = $_SESSION['temp_id'];
    $na = $_SESSION['tempname'];
    Conn()->getQuery("INSERT INTO temp_user (name,user_id,basket,up_votes) VALUES ('$na','$user','$cart','$itemup')");
}	// 2. Unset all the session variables
		$_SESSION = array();

		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }

		// 4. Destroy the session
		session_destroy();

        header("Location: ../index.php");

