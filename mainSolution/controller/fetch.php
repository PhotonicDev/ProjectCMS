<?php
include "../model/conn.php";
$co = mysqli_connect($host,$user,$pass,$dbName);
if(isset($_GET['cart'])) {
    session_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], $_SESSION['LOC'][1]);
}
if(isset($_GET['vote'])) {
    session_start();
    $vote = $_SESSION['LOC'][0] + 1;
    array_push($_SESSION['up'],$_SESSION['LOC'][1]);
    $result = mysqli_query($co ,"UPDATE `products` SET `upVote` ='" . $vote . "' WHERE `Product_ID` =" . $_SESSION['LOC'][1]);
}
