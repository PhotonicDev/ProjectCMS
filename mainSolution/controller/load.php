<?php


function load($user){
    $sqlLoad = "SELECT `basket`, `up_votes` FROM `customers` WHERE customer_id ='{$user}' LIMIT 1";
    $conn = mysqli_connect("localhost", "root", "123", "db_cms");
    $result = mysqli_query($conn, $sqlLoad);
    $data = mysqli_fetch_array($result);
    if(!empty($data['basket'])){
        $bas =  $data['basket'];
        $_SESSION['cart'] = explode(' ',$bas);
    }
    if(!empty($data['up_votes'])) {
        $up = $data['up_votes'];
        $_SESSION['up'] = explode(' ',$up);
    }

}
function load_temp($temp) {
    $sqlLoad = "SELECT `basket`, `up_votes` FROM `customers` WHERE customer_id ='{$temp}' LIMIT 1";
    $conn = mysqli_connect("localhost", "root", "123", "db_cms");
    $result = mysqli_query($conn, $sqlLoad);
    $temp_data = mysqli_fetch_array($result);
    if(!empty($temp_data['basket'])){
    $temp_bas =  $temp_data['basket'];
    $_SESSION['cart'] = explode(' ',$temp_bas);
    }
    if(!empty($temp_data['up_votes'])) {
        $temp_up = $temp_data['up_votes'];
        $_SESSION['up'] = explode(' ', $temp_up);
    }
}
function create_new(){
    $userRan = uniqid();
    setcookie('temp', $userRan,time()+3600*24*30, '/');
    $_SESSION['temp_id'] = $userRan;
}