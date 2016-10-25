<?php
require_once ("includes/constants.php");
require_once ("includes/functions.php");
require_once("includes/session.php");


if(isset($_POST['submit'])) {

    //get the name and comment entered by user
    $user = mysql_prep($_POST['username']);
    $email = mysql_prep($_POST['email']);
    $password = mysql_prep($_POST['password']);



    $check=mysqli_query($conn, "SELECT * FROM `customers` WHERE `name` = '$user' AND `email` = '$email'");
    $rows_result=mysqli_num_rows($check);

    $regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";


if(preg_match($regexp, $_POST['email'])){

    if($rows_result > 0) {
        echo "This user already exists";
    } else {

        $iterations = ['cost' => 10]; // encrypting password - hashing it 10 times
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
        //insert results from the form input
        $query = "INSERT INTO `admin`( `name`, `password` , `email`) VALUES ('$user', '$hashed_password', '$email')";
        $result = mysqli_query($conn, $query) or die('Error querying database.');

        echo "New user successfully created!";

        mysqli_close($conn);
    }

}

else{

    echo "Your ". "<b> " .$_POST['email'] . "</b> " . " "."email is not correct";

}


};
?>