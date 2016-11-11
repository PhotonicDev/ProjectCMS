<?php
if (isset($_GET['search'])) {
    $q = $_GET['search'];
    $connect = mysqli_connect("localhost", "root", "lpokji12" /* "123" */, "db_cms");
    $output = '';
    $sql = "SELECT * FROM products WHERE name LIKE '%".$_GET["search"]."%'";
    $result = mysqli_query($connect, $sql);
    include_once "../view/results.php";
}
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
    $connect = mysqli_connect("localhost", "root", "123" /* "lpokji12" */, "db_cms");
    $sql = "UPDATE `products` SET `upVote` ='" . $vote . "' WHERE `Product_ID` =" . $_SESSION['LOC'][1];
    $result = mysqli_query($connect, $sql);
}
