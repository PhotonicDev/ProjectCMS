<?php

require_once ("includes/constants.php");
require_once ("includes/functions.php");
require_once("includes/session.php");

if (logged_in()) {
    redirect_to("frontpage.php");
}

if (isset($_POST['submit'])) {
    $username = mysql_prep( $_POST['username']);
    $password = mysql_prep( $_POST['password']);

    $query = "SELECT `customer_id`, `name`, `password` FROM `customers` WHERE `name` = '{$username}' LIMIT 1";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) == 1) {
        // username/password authenticated
        // and only 1 match
        $found_user = mysqli_fetch_array($result);
        if(password_verify($password, $found_user['password'])){
            $_SESSION['user_id'] = $found_user['customer_id'];
            $_SESSION['username'] = $found_user['name'];
            redirect_to("frontpage.php");
        }
        else {
            $message = "Password is incorrect.<br />
					Please make sure your caps lock key is off and try again.";
            echo $message;
        }
    }

    else {

        echo "Username and password combination is incorrect" ."<br>". "Please make sure your caps lock key is off and try again.";
    }

}



if (isset($connection)){mysqli_close($connection);}
?>